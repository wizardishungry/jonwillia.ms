---
layout: post
title: "2-Factor Authentication for OpenBSD Using Google Authenticator and totp-util"
description: "Restrict access to your OpenBSD server using 2-Factor Authentication"
category: openbsd
tags: [2fa, openbsd, ssh, totp, qr]
---
{% include JB/setup %}

*This post is adapted from my [OpenBSD guide](https://github.com/WIZARDISHUNGRY/totp-util/wiki/OpenBSD-Guide) in the [totp-util](https://github.com/WIZARDISHUNGRY/totp-util) wiki.*

I recently set up a semi-public OpenBSD box, and thought I could stand to lock down password logins, especially for the root user.
I wrote `[totp-util](https://github.com/WIZARDISHUNGRY/totp-util)` to simplify the process of setting up Google Authenticator on UNIX systems.

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
Now regular users should be able to authenticate with just SSH (or a password plus totp token) but root will need password, ssh and a 2 TOTP token.

# Logging in
```
$ ssh root@machine   
Authenticated with partial success.
user@machine's password: 123456/password
```
