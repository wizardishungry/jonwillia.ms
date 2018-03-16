---
layout: post
title: "MTA Subway Status iCalendar Feed"
description: "iCal feed of realtime MTA subway status"
category: Transit 
tags: [MTA, NYC, calendar, Ruby, transit, subway]
---
{% include JB/setup %}

6 Mar 2018: I've fixed this!

I've created a [iCalendar](http://en.wikipedia.org/wiki/ICalendar) (ics) feed of up-to-the-minute MTA train status that you can subscribe to on your phone or calendar application.
It only displays the regular subway lines.

[<img src="/assets/images/mta-ical-osx-1.png" alt="iCal displaying MTA status in OSX" style="float: right; max-width: 42%">](/assets/images/mta-ical-osx-1.png)
[<img src="/assets/images/mta-ical-ios-1.png" alt="iCal displaying MTA status in iOS" style="padding: 4px; clear: right; float: right; max-width: 20%">](/assets/images/mta-ical-ios-1.png)
[<img src="/assets/images/mta-ical-ios-2.png" alt="iCal displaying MTA status in iOS" style="padding: 4px; float: right; max-width: 20%">](/assets/images/mta-ical-ios-2.png)

# Subscribe

* Subway
  * [Subscribe in calendar app](webcal://mta-status-ical.herokuapp.com/)
  * Direct Link: [https://mta-status-ical.herokuapp.com/](https://mta-status-ical.herokuapp.com/)
* Ideas for additional feeds
  * Subway + Bus
  * LIRR
  * Metro North
  * Staten Island Railroad
  * Everything

<br clear="both">
Source
------
*Ruby source is available on Github: [github.com/WIZARDISHUNGRY/mta-status-ical](https://github.com/WIZARDISHUNGRY/mta-status-ical)*
