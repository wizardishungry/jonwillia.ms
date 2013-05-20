---
layout: post
title: "Make Sure All Your Test Classes Are Loaded by Your Test Suite"
description: "Using strace to validate that all test classes and fixtures are loaded"
category: webdev
tags: [strace, php, testing, phpunit, bash]
---
{% include JB/setup %}

We were having an issue with developers ommiting or removing tests from our test harness. So I kluged together a PHP/Bash monotrosity that prints a list of files not loaded during the execution of the test harness. Although this is a little coarse, it does provide a list of outdated fixtures, new unadded tests and defunct tests to be removed/fixed. You probably want to tee this into a logfile.

{% gist 5413908 %}

Example output:
{% highlight bash %}
{% endhighlight %}
