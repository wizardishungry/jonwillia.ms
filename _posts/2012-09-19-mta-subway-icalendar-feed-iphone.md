---
layout: post
title: "MTA Real-time Subway Status iCalendar Feed"
description: "iCal feed of realtime MTA subway status for iPhone"
category: webdev 
tags: [mta, ical, iphone, ics, ruby]
---
{% include JB/setup %}

THIS IS BROKEN RIGHT NOW
====

I've created a [iCalendar](http://en.wikipedia.org/wiki/ICalendar) (ics) feed of up-to-the-minute MTA train status that you can subscribe to on your phone or calendar application.
Right now you can only subscribe to Subway. I find having this always updated in my iPhone's notification center is better than using a heavy weight dedicated app.

* **iPhone / iOS / Mac OS X:** I recomend using iCloud for to sync calendar subscriptions across devices.
* **Google Calendar** I don't think Google polls often enough for this to be useful. YMMV 
* A short url for this page is: [mta.jonwillia.ms](http://mta.jonwillia.ms)

[<img src="/assets/images/mta-ical-osx-1.png" alt="iCal displaying MTA status in OSX" style="float: right; max-width: 42%">](/assets/images/mta-ical-osx-1.png)
[<img src="/assets/images/mta-ical-ios-1.png" alt="iCal displaying MTA status in iOS" style="padding: 4px; clear: right; float: right; max-width: 20%">](/assets/images/mta-ical-ios-1.png)
[<img src="/assets/images/mta-ical-ios-2.png" alt="iCal displaying MTA status in iOS" style="padding: 4px; float: right; max-width: 20%">](/assets/images/mta-ical-ios-2.png)

# Subscribe

* Subway
  * [Subscribe in iCal / OS X Calendar](webcal://mta.jonwillia.ms/subway.ics)
  * Direct Link: [http://mta.jonwillia.ms/subway.ics](http://mta.jonwillia.ms/subway.ics)
* Todo
  * Subway + Bus
  * LIRR
  * Metro North
  * Staten Island Railroad
  * Everything

<br clear="both">
Source
------
*Ruby source is available on Github: [github.com/WIZARDISHUNGRY/mta-status-ical](https://github.com/WIZARDISHUNGRY/mta-status-ical)*
