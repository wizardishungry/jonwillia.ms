---
layout: post
title: "MTA Real-time Subway Status iCalendar Feed"
description: "iCal feed of realtime MTA subway status for iPhone"
category: webdev 
tags: [mta, ical, iphone, ics, ruby]
---
{% include JB/setup %}

I've created a [iCalendar](http://en.wikipedia.org/wiki/ICalendar) (ics) feed of up-to-the-minute MTA train status that you can subscribe to on your phone or calendar application.
Right now you can only subscribe to Subway. **iPhone users:** I recomend using iCloud for to sync calendar subscriptions across devices. **Google Calendar users:** I don't think Google polls often enough for this to be useful. YMMV 

[<img src="/assets/images/mta-ical-osx-1.png" align="right" alt="iCal displaying MTA status in OSX" style="max-width: 40%">](/assets/images/mta-ical-osx-1.png)
Subscribe:
----------
* Subway
  * [Subscribe in iCal / OS X Calendar](webcal://mta.jonwillia.ms/subway.ics)
  * Direct Link: [http://mta.jonwillia.ms/subway.ics](http://mta.jonwillia.ms/subway.ics)
* Subway + Bus
* LIRR
* Metro North
* Staten Island Railroad
* Everything

Source
------
*Ruby source is available on Github: [github.com/WIZARDISHUNGRY/mta-status-ical](https://github.com/WIZARDISHUNGRY/mta-status-ical)*
