---
layout: post
title: "Lenovo Ideapad 120S"
description: "notes on getting various operating systems working on the Lenovo Ideapad 120S"
category: Hardware
tags: [Linux, OpenBSD, Debian, laptop, arm64]
---
{% include JB/setup %}

I picked up a [Lenovo Ideapad 120S](https://www3.lenovo.com/us/en/laptops/ideapad/ideapad-100-series/Ideapad-120S-11-Intel/p/88IP10S0891)
for ~$150USD, a relative steal even for such a puny machine. I'm compiling my notes on hardware support under Linux and OpenBSD as I go.

## General notes

The device comes with Windows 10 Home 64-bit installed on it. The hard drive appears to be a 64 GB MMC reader. The drive is partitioned with:
* an [EFI partition](https://en.wikipedia.org/wiki/EFI_system_partition), ~256 MB FAT
* a [Microsoft Reserved Partition](https://en.wikipedia.org/wiki/Microsoft_Reserved_Partition), 16 MB
* an OEM recovery partition, 10 GB NTFS
* the Windows 10 Home partition, ~50 GB NTFS

The system has a small button on the right hand side you may depress with a paper clip to enter the BIOS/EFI configuration screen.
Disable "Secure Boot" before attempting to install another operating system. You may also adjust the boot order here.
Insert your USB drive before entering the configuration menu and allow it to boot first.

Although it would be possible to resize the NTFS partition to 35 GB or so and install another operating system alongside Windows,
I chose to nuke the entire partition map so that I wouldn't be space constrained.

## Debian Testing (buster)

The install image I picked was [ debian-testing-amd64-netinst.iso ](https://cdimage.debian.org/cdimage/weekly-builds/amd64/iso-cd/);
I burned it to a flash drive by running (on a Mac)
<pre class="code">
sudo dd if=debian-testing-amd64-netinst.iso of=/dev/diskXXX bs=1m
</pre>

The trackpad did not work during install, so I used the text-based installer.  It was totally functional upon reboot.

You will be prompted for [missing non-free firmware](https://wiki.debian.org/Firmware) for the Atheros wireless card.
I followed the instructions and loaded the firmware via a second USB drive.
The installer prompted me again for missing firmware, this time with a much shorter list (including ath10k). You may safely proceed.
If your installer prompts you to manually select your network card (instead of proceeding to WiFi configuration),
you messed up; restart the installation.

## OpenBSD

*So far I've tried 6.2 and a snapshot of pre-release 6.3. I will note where 6.3 differs.*

Attempting to boot with the system in EFI mode results in a blank screen after the `BOOTX64` prompt. Booting using BIOS gets you into the installer in 6.2.
6.3 successfully boots the installer using EFI.

The internal storage is an MMC device, which although supported, is not included in the install kernel<label for="sn-rpi" class="margin-toggle sidenote-number"></label><input type="checkbox" id="sn-rpi" class="margin-toggle">
<span class="sidenote">See discussion of [installing OpenBSD on the Raspberry Pi 3](https://undeadly.org/cgi?action=article&sid=20170409123528).</span>
at this time.

The Atheros wireless isn't supported and shows up as<label for="sn-62-dmesg" class="margin-toggle sidenote-number"></label><input type="checkbox" id="sn-62-dmesg" class="margin-toggle">
<span class="sidenote">See [`dmesg`](http://dmesgd.nycbug.org/index.cgi?do=view&id=3526)</span>:
<pre class="code">
vendor "Atheros", unknown product 0x0042 (class network subclass miscellaneous, rev 0x31) at pci2 dev 0 function 0 not configured
</pre>

I've noticed problems with mass storage devices not showing up, which seems to relate to the USB hub
<pre class="code">
uhub0: device problem, disabling port 5
</pre>

After installing 6.3 snapshot to a second USB drive, selecting the USB drive as the boot target and booting,
we see the regular 6.3 multiprocessor kernel spin up as expected. After a bit, we get a blank screen like we did
booting the 6.2 install kernel and are unable to proceed further.
