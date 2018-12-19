---
layout: post
title: "Deploying Anycast DNS using OpenBSD and BGP"
description: "Anycast DNS using OpenBSD + vmm/vmd + BGP + relayd + unbound/nsd"
category: featured
tags: [OpenBSD, BGP, DNS, NYCMesh, routing]
---
{% include JB/setup %}

My home network is connected to [NYCMesh](https://nycmesh.net/), a community-owned open network.
Recently, the failure of an SD card inside a Raspberry Pi at an adjacent large hub has left my area of the network without a caching recursive resolver to serve DNS for both the `.mesh` TLD and the wider internet. I stood up my own instance of the [`10.10.10.10` anycast DNS resolver](https://github.com/nycmeshnet/nycmesh-dns) to service DNS in my neighborhood of the network.

## Overview
Inside the mesh, DNS is serviced by the anycast IP address `10.10.10.10` by announcing a BGP route for this IP address.
Nodes near to me will use my instance for DNS resolution because the routing topology will prefer my instance over a distant instance.

The major components of this build will be:
* [OpenBSD](https://www.openbsd.org/) - Operating system for my network gateway and my anycast resolver instance.
* [`vmd`](https://man.openbsd.org/vmd) - Hypervisor for hosting a virtualized copy of OpenBSD, for running the resolver instance.
* [`unbound`](https://man.openbsd.org/unbound) - Caching recursive DNS resolver, for serving DNS requests to clients.
* [`nsd`](https://man.openbsd.org/nsd) - Authoritative DNS server, for supplying `.mesh` to `unbound`.
* [`relayd`](https://man.openbsd.org/relayd) - Application layer gateway that keeps a route from my BGP instance to the DNS instance up, if health checks are passing.
* [OpenBGP](https://www.openbgp.org/) - [Border Gateway Protocol](https://en.wikipedia.org/wiki/Border_Gateway_Protocol) daemon, included in OpenBSD.

The gateway machine has already been configured as a router to allow forwarding of packets, and functions as a router, LAN DNS forwarder, and web server.

## Setup Virtual Machine

The virtual machine base system is installed mostly using the [autoinstall](https://man.openbsd.org/autoinstall) facility, you may prefer a manual installation.

**[`/etc/vm.conf`](https://man.openbsd.org/vm.conf):**
```
vm "nycmesh-dns" {
    enable
    owner jon:wheel
    memory 512M
    # First disk from 'vmctl create "/home/vm/nycmesh-dns.img" -s 1G'
    disk "/home/vm/nycmesh-dns.img"
    #boot "/bsd.rd" # For install
    interface {
        switch "vmnet"
        locked lladdr 00:00:0A:46:91:C2
    }
}
```

**[`/etc/dhcpd.conf`](https://man.openbsd.org/dhcpd.conf):**
```
authoritative;
option domain-name "bongo.zone";
use-host-decl-names on;
filename "auto_install";

# vmd service zone
subnet 10.70.145.192 netmask 255.255.255.224 {
  range 10.70.145.196 10.70.145.222;
  option routers 10.70.145.193;
  option domain-name-servers 10.70.145.1, 10.10.10.10, 10.70.131.129;

  host nycmesh-dns {
    fixed-address nycmesh-dns.bongo.zone, 10.10.10.10;
    hardware ethernet 00:00:0A:46:91:C2;
  }

}
```

**[`/var/www/htdocs/default/nycmesh-dns-install.conf`](https://man.openbsd.org/autoinstall):**
```
# autoinstall response file for unattended installation
# https://man.openbsd.org/autoinstall
#Password for root account = plaintext / encrypt(1) / "*************" to disable
Password for root account = *************
Change the default console to com0 = yes
Which speed should com0 use = 19200
Public ssh key for root account = ssh-rsa AAAA…XYZZY jon@kibble.bongo.zone
Start sshd(8) by default = yes
Do you expect to run the X Window System = no
Setup a user = no
Allow root ssh login = prohibit-password
What timezone are you in = America/New_York
Which disk is the root disk = sd0
URL to autopartitioning template for disklabel = https://kibble.bongo.zone/disklabel.min
Location of sets = http
HTTP proxy URL = none
HTTP Server = cdn.openbsd.org
Server directory = /pub/OpenBSD/6.3/amd64
Set name(s) = -comp* -game* -x* -man*
```

We may now access this virtual machine **only** via ssh.

## Zonefile pull on the VM

NYCMesh generally uses [`kresd/knot`](https://www.knot-resolver.cz/) as their DNS server and
keeps the zone files and configuration in a [git repo](https://github.com/nycmeshnet/nycmesh-dns).
Because OpenBSD has a fairly old version of knot, I decided to use the base system DNS servers to
serve the zone files. (I should probably move this to a Linux VM running kresd/knot to be in line with the rest of the mesh.)

First I checked out a copy of the git repo using anonymous HTTP so I wouldn't need github credentials on the VM.
```bash
pkg_add git python-2.7.14p1 bash
git clone https://github.com/nycmeshnet/nycmesh-dns.git
```
I setup a script to auto-pull the zonefile updates, based on the same script for Linux/Unbound. 

**`/root/nycmesh-dns/deploy-nsd.sh`:**
```bash
#!/usr/local/bin/bash
export PATH=$PATH:/usr/local/bin

# OpenBSD + Unbound + NSD

cd /root/nycmesh-dns
git pull

NEWCOMMIT=`git rev-parse HEAD`
OLDCOMMIT=`cat commit`

if [ "$NEWCOMMIT" == "$OLDCOMMIT" ]
then
  exit 0
fi

python makereverse.py
cp -f *.zone /var/nsd/zones/master
rcctl restart nsd unbound
git rev-parse HEAD > commit
```

I later added a cron entry.
```
*/10    *       *       *       *       cd /root/nycmesh-dns && /root/nycmesh-dns/deploy-nsd.sh 2>&1 > /dev/null
```

## Setup NSD and Unbound on the VM

First tweak the networking confiruration (`/etc/hostname.vio0`): 
```
dhcp
inet alias 10.10.10.10/32
```

`nsd` will serve zone files from git.

**[`/var/nsd/etc/nsd.conf`](https://man.openbsd.org/nsd.conf):**
```
server:
        hide-version: yes
        verbosity: 1
        database: "" # disable database

## bind to a specific address/port
ip-address: 127.0.0.1@53

remote-control:
        control-enable: yes

zone:
        name: "mesh"
        zonefile: "master/mesh.zone"
zone:
        name: "10.in-addr.arpa"
        zonefile: "master/10.in-addr.arpa.zone"
zone:
        name: "59.167.199.in-addr.arpa"
        zonefile: "master/59.167.199.in-addr.arpa.zone"
```

`unbound` will serve as a recursive resolver.

**[`/var/unbound/etc/unbound.conf`](https://man.openbsd.org/unbound.conf):**
```
server:
        private-domain: "mesh"
        domain-insecure: "mesh"
        do-not-query-localhost: no
        #interface: 127.0.0.1
        interface: 10.10.10.10
        interface: 10.70.145.194
        interface: 127.0.0.1@5353       # listen on alternative port
        interface: ::1
        do-ip6: no

        prefetch: yes

        # override the default "any" address to send queries; if multiple
        # addresses are available, they are used randomly to counter spoofing
        outgoing-interface: 10.70.145.194

        access-control: 0.0.0.0/0 refuse
        access-control: 127.0.0.0/8 allow
        access-control: 10.0.0.0/8 allow
        access-control: 199.167.59.0/24 allow
        access-control: ::0/0 refuse
        access-control: ::1 allow

        hide-identity: yes
        hide-version: yes

remote-control:
        control-enable: yes
        control-use-cert: no
        control-interface: /var/run/unbound.sock

forward-zone:
        name: "mesh."
        forward-addr: 127.0.0.1
forward-zone:
        name: "10.in-addr.arpa."
        forward-addr: 127.0.0.1
forward-zone:
        name: "59.167.199.in-addr.arpa."
        forward-addr: 127.0.0.1
```

Start both servers and try to see if you can resolve `ns.mesh`.
```
nycmesh-dns# rcctl restart nsd unbound
nsd(ok)
nsd(ok)
unbound(ok)
unbound(ok)
nycmesh-dns# host ns.mesh 10.10.10.10
Using domain server:
Name: 10.10.10.10
Address: 10.10.10.10#53
Aliases:

ns.mesh has address 10.10.10.11
```
## relayd health check

`relayd` adds a route to `10.0.10.10/32` if the healthcheck passes. If the DNS server stops responding, the route is removed from the kernel and BGP retracts it from peers.

**`/usr/local/bin/mesh-dns-health-check.sh`:**
```bash
#!/bin/sh
! host -W 1 ns.mesh. $1
```

**[`/etc/relayd.conf`](https://man.openbsd.org/relayd.conf):**
```
log updates

timeout 2000
interval 3
table <dns-servers> { nycmesh-dns.bongo.zone ip ttl 1 retry 0 }
router "anycast-dns" {
  route 10.10.10.10/32
  #forward to <dns-servers> check icmp
  forward to <dns-servers> check script "/usr/local/bin/mesh-dns-health-check.sh"
  rtlabel export
}
```
Start relayd and verify the route gets added. 
```
kibble# rcctl restart relayd
kibble# traceroute 10.10.10.10
traceroute to 10.10.10.10 (10.10.10.10), 64 hops max, 40 byte packets
 1  10.10.10.10 (10.10.10.10)  1.162 ms  0.327 ms  0.485 ms
 ```

## BGP announcement of `10.10.10.10`

Setting up BGP is a whole task in and of itself, but I have included a partial BGP configuration for reference.

**[`/etc/bgpd.conf`](https://man.openbsd.org/bgpd.conf):**
```
# global configuration
AS 65009
router-id 10.70.130.139
network 10.70.145.0/24
network 199.167.59.73/32
network inet static # This is the line that causes our dynamically inserted routes to get picked up
#network inet connected
# restricted socket for bgplg(8)
socket "/var/www/run/bgpd.rsock" restricted

# neighbors and peers
group "nycmesh" {
        neighbor 10.70.130.138 {
                remote-as 64996
                descr   "Node 1340"
                announce self
        }
}

# do not send or use routes from EBGP neighbors without
# further explicit configuration
#deny from ebgp
#deny to ebgp

allow from group nycmesh
```

## Further reading

Full configuration [available on github](https://github.com/bongozone/kibble)
