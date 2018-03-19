---
layout: post
title: "2 Factor Authentication for OpenBSD"
category: security
tags: [2FA, OpenBSD, OpenSSH, TOTP ]
---
{% include JB/setup %}

*This post is adapted from my [OpenBSD guide](https://github.com/WIZARDISHUNGRY/totp-util/wiki/OpenBSD-Guide) in the [totp-util](https://github.com/WIZARDISHUNGRY/totp-util) wiki.*

I recently set up a semi-public OpenBSD box, and thought I could stand to lock down password logins, especially for the root user.
A popular system for two-factor authentication is [TOTP](https://en.wikipedia.org/wiki/Time-based_One-time_Password_Algorithm):

> In a typical two-factor authentication application, user authentication proceeds as follows: a user enters username and password into a website or other server, generates a one-time password for the server using TOTP running locally on a smartphone or other device, and types that password into the server as well. The server then also runs TOTP to verify the entered one-time password. For this to work, the clocks of the user's device and the server need to be roughly synchronized (the server will typically accept one-time passwords generated from timestamps that differ by ±1 time interval from the client's timestamp). A single secret key, to be used for all subsequent authentication sessions, must have been shared between the server and the user's device over a secure channel ahead of time. If some more steps are carried out, the user can also authenticate the server using TOTP.

I wrote [totp-util](https://github.com/WIZARDISHUNGRY/totp-util) to simplify the process of setting up Google Authenticator on UNIX systems.


## Install utilities
<pre class="code">
npm install -g https://github.com/WIZARDISHUNGRY/totp-util
pkg_add login_oath
</pre>

## User setup
* run `totp-util` to setup `~/.totp-key`
* Scan the code in Google Authenticator

## Setup authentication and SSH
We're assuming everyone on the server is using SSH key authentication.
Change `/etc/login.conf` to force TOTP+password when not using public key authentication.

<pre class="code">
# Default allowed authentication styles
auth-defaults:auth=-totp-and-pwd,skey:
</pre>

Edit `/etc/ssh/sshd_config` to force SSH logins by root to use __both__ an ssh key and a totp/password.

<pre class="code">
Match User root
AuthenticationMethods publickey,password
</pre>

Restart sshd and update the login capabilities database.

<pre class="code">
/etc/rc.d/sshd restart
cap_mkdb /etc/login.conf
</pre>

Now regular users should be able to authenticate with just SSH (or a password plus TOTP token) but root will need password, ssh-key and a TOTP token.

## Logging in
<pre class="code">
$ ssh root@machine   
Authenticated with partial success.
user@machine's password: 123456/password
</pre>
