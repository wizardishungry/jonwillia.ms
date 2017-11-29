---
layout: post
title: "2-Factor Authentication for OpenBSD Using Google Authenticator and totp-util"
category: openbsd
tags: [2fa, openbsd, ssh, totp, qr, javascript, crypto]
---
{% include JB/setup %}

*This post is adapted from my [OpenBSD guide](https://github.com/WIZARDISHUNGRY/totp-util/wiki/OpenBSD-Guide) in the [totp-util](https://github.com/WIZARDISHUNGRY/totp-util) wiki.*

I recently set up a semi-public OpenBSD box, and thought I could stand to lock down password logins, especially for the root user.
A popular system for two-factor authentication is [TOTP](https://en.wikipedia.org/wiki/Time-based_One-time_Password_Algorithm):

 > In a typical two-factor authentication application, user authentication proceeds as follows: a user enters username and password into a website or other server, generates a one-time password for the server using TOTP running locally on a smartphone or other device, and types that password into the server as well. The server then also runs TOTP to verify the entered one-time password. For this to work, the clocks of the user's device and the server need to be roughly synchronized (the server will typically accept one-time passwords generated from timestamps that differ by ±1 time interval from the client's timestamp). A single secret key, to be used for all subsequent authentication sessions, must have been shared between the server and the user's device over a secure channel ahead of time. If some more steps are carried out, the user can also authenticate the server using TOTP.

I wrote [totp-util](https://github.com/WIZARDISHUNGRY/totp-util) to simplify the process of setting up Google Authenticator on UNIX systems.


# Install utilities
```
npm install -g https://github.com/WIZARDISHUNGRY/totp-util 
pkg_add login_oath
```

# User setup
* run `totp-util` to setup `~/.totp-key`
* Scan the code in Google Authenticator

# Setup authentication and SSH
* We're assuming everyone on the server is using ssh key auth. Change this in `/etc/login.conf`

```
# Default allowed authentication styles
auth-defaults:auth=-totp-and-pwd,skey:
```

Edit `/etc/ssh/sshd_config` to force SSH logins by root to use __both__ an ssh key and a totp/password. 

```
Match User root
AuthenticationMethods publickey,password
```

Then run:

```
/etc/rc.d/sshd restart 
cap_mkdb /etc/login.conf
```

Now regular users should be able to authenticate with just SSH (or a password plus totp token) but root will need password, ssh-key and a TOTP token.

# Logging in
```
$ ssh root@machine   
Authenticated with partial success.
user@machine's password: 123456/password
```
