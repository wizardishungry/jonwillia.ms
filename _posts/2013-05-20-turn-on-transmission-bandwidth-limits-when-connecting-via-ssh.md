---
layout: post
title: "Turn on Transmission Bandwidth Limits When Connecting via Ssh"
description: "Make the Transmission BitTorrent client turn on the alternate bandwidth limits (turtle mode) when you login over ssh and turn back on when you log out of the last ssh connection."
category: Internet
tags: [BitTorrent, P2P, OpenSSH, Unix, Bash]
---
{% include JB/setup %}

I spend a lot of time logged into my home machine via ssh and find it irritating that my network performance degrades when [Transmission](http://www.transmissionbt.com/) is making speedy progress on a torrent. I've [assembled a script to click the turtle icon](https://gist.github.com/WIZARDISHUNGRY/5613184) when you connect via ssh and uncheck it when the last ssh connection leaves.
