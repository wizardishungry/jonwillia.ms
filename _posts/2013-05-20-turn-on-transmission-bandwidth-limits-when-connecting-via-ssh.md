---
layout: post
title: "Turn on Transmission Bandwidth Limits When Connecting via Ssh"
category: featured
tags: [Internet, BitTorrent, P2P, OpenSSH, Unix, Bash]
---
{% include JB/setup %}

I spend a lot of time logged into my home machine via ssh and find it irritating that my network performance degrades when [Transmission](http://www.transmissionbt.com/) is making speedy progress on a torrent. I've [assembled a script to click the turtle icon](https://gist.github.com/WIZARDISHUNGRY/5613184) when you connect via ssh and uncheck it when the last ssh connection leaves.
