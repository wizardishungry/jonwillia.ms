---
layout: post
title: "Lenovo Ideapad 120S"
description: "notes on getting various operating systems working"
category: featured
tags: [Linux, OpenBSD, Debian, laptop, arm64, hardware]
---
{% include JB/setup %}

I picked up a [Lenovo Ideapad 120S](https://www3.lenovo.com/us/en/laptops/ideapad/ideapad-100-series/Ideapad-120S-11-Intel/p/88IP10S0891)
for ~$150USD, a relative steal even for such a puny machine. I'm compiling my notes on hardware support under Linux and OpenBSD as I go.

## General notes

The trackpad is pretty great for a cheap laptop, but not as nice as a MacBook's. Windows 10 performance is terrible; taking multiple hours to install Windows updates. Battery life is good; right now I'm seeing ~7 hours reported remaining at 90% capacity
under Debian.

### Keyboard

The keyboard is of a chiclet design, similar to current generation MacBooks. Key caps are slightly rounded on the bottom, giving the keys a shield shape. The position of the Fn and Ctrl keys is my major complaint with the keyboard; they should be swapped.

<table border="1" style="width: auto">
   <tbody><tr>
   <td colspan="9">Esc</td>
   <td colspan="8">F1</td>
   <td colspan="8">F2</td>
   <td colspan="8">F3</td>
   <td colspan="8">F4</td>
</tr>
  <tr>
   <td colspan="8">~</td>
   <td colspan="10">1</td>
   <td colspan="10">2</td>
   <td colspan="10">3</td>
   <td colspan="10">4</td>
  </tr>
  <tr>
   <td colspan="10">Tab</td>
   <td colspan="10">Q</td>
   <td colspan="10">W</td>
   <td colspan="10">E</td>
   <td colspan="10">R</td>
  </tr>
  <tr>
    <td colspan="12">CapsLk</td>
    <td colspan="10">A</td>
    <td colspan="10">S</td>
    <td colspan="10">D</td>
  </tr>
  <tr>
   <td colspan="18">Shift</td>
   <td colspan="10">Z</td>
   <td colspan="10">X</td>
   <td colspan="10">C</td>
  </tr>
  <tr>
   <td colspan="10">Ctrl</td>
   <td colspan="10">Fn</td>
   <td colspan="10">❖</td>
   <td colspan="10">Alt</td>
   <td colspan="48">&nbsp;</td>

</tr>
</tbody></table>

### Storage
The device comes with Windows 10 Home 64-bit installed on it. The hard drive appears to be a 64 GB MMC reader. The drive is partitioned with:
* an [EFI partition](https://en.wikipedia.org/wiki/EFI_system_partition), ~256 MB FAT
* a [Microsoft Reserved Partition](https://en.wikipedia.org/wiki/Microsoft_Reserved_Partition), 16 MB
* an OEM recovery partition, 10 GB NTFS
* the Windows 10 Home partition, ~50 GB NTFS

Although it would be possible to resize the NTFS partition to 35 GB or so and install another operating system alongside Windows,
I chose to nuke the entire partition map so that I wouldn't be space constrained.

### BIOS/EFI
The system has a small button on the right hand side you may depress with a paper clip to enter the BIOS/EFI configuration screen.
Disable "Secure Boot" before attempting to install another operating system. You may also adjust the boot order here.
Insert your USB drive before entering the configuration menu and allow it to boot first.

There are also options related to enabling virtualization features (I turned these on).

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

*So far I've tried 6.2 and a snapshot of pre-release 6.3. I will note where 6.3 differs. This section is subject to revision*

Attempting to boot with the system in EFI mode results in a blank screen after the `BOOTX64` prompt. Booting using BIOS gets you into the installer in 6.2.
6.3 successfully boots the installer using EFI.

The internal storage is an MMC device, which although supposedly supported &amp; and visible in the dmesg,
does not show up as a `sd` device. We are unable to proceed further unless we install to a USB drive.
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
booting the 6.2 install with BIOS and are unable to proceed further.
