---
layout: post
title: "Make Sure All Your Test Classes Are Loaded by Your Test Suite"
description: "Using strace to validate that all test classes and fixtures are loaded"
category: webdev
tags: [strace, php, testing, phpunit, bash]
---
{% include JB/setup %}

We were having an issue with developers ommiting or removing tests from our test harness. So I kluged together a PHP/Bash monotrosity that prints a list of files not loaded during the execution of the test harness as determined by [strace](http://en.wikipedia.org/wiki/Strace)'s log of file access. Although this is a little coarse, it does provide a list of outdated fixtures, new unadded tests and defunct tests to be removed/fixed. You probably want to tee this into a logfile.

{% gist 5413908 %}

Example output:
{% highlight bash %}
php util_scripts/TestSuiteCoverage.php
/home/jon/build/Spam/util_scripts/CommitTest.php
This is SLOW!
Logging strace to /tmp/TestSuiteCoverage-z0EBOL

phpunit   /home/jon/build/Spam/util_scripts/../library/SpacelySprockets/Test/Suite/Integration/Frontend.php /home/jon/build/Spam/util_scripts/../library/SpacelySprockets/Test/Suite/Integration/Foobar.php /home/jon/build/Publications/util_scripts/../library/SpacelySprockets/Test/Case/Zork/FoobarIntegration.php /home/jon/build/Publications/util_scripts/../library/SpacelySprockets/Test/Suite/Integration/ViewHelper.php /home/jon/build/Publications/util_scripts/../library/SpacelySprockets/Test/Suite/Unit/All.php

PHPUnit 3.6.3 by Sebastian Bergmann.

...............................................................  63 / 528 ( 11%)
............................................................... 126 / 528 ( 23%)
............................................................... 189 / 528 ( 35%)
............................................................... 252 / 528 ( 47%)
............................................................... 315 / 528 ( 59%)
............................................................... 378 / 528 ( 71%)
............................................................... 441 / 528 ( 83%)
............................................................... 504 / 528 ( 95%)
........................

Time: 19:56, Memory: 558.25Mb

OK (528 tests, 5557 assertions)
1 files encountered of 362; 361 missing

/home/jon/build/Spam/library/SpacelySprockets/Test/Suite/Integration/CodeLibrary.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Suite/Integration/Fizbuzz.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Suite/Integration/Service.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Suite/Integration/Model.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Suite/Unit/All.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Library/Constant/DefaultProfile.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Library/Autoloader.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Mock/Acl/Frontend.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Mock/View/Helper/TabbedPane.php
/home/jon/build/Spam/library/SpacelySprockets/Test/Fixtures/video-fizbuzz.sql
/home/jon/build/Spam/library/SpacelySprockets/Test/Fixtures/content_comment.sql
/home/jon/build/Spam/library/SpacelySprockets/Test/Fixtures/member-usage.sql
/home/jon/build/Spam/library/SpacelySprockets/Test/Fixtures/stats-test.sql
{% endhighlight %}
