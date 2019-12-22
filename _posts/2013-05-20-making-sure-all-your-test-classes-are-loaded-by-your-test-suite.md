---
layout: post
title: "Making Sure All Your Test Classes Are Dynamically Loaded by Your Test Suite"
category: featured
tags: [programming, strace, PHP, testing, PHPUnit]
---
{% include JB/setup %}

We were having an issue with developers ommiting or removing tests from our test harness. So I kluged together a PHP/Bash monotrosity that prints a list of files not loaded during the execution of the test harness as determined by [strace](http://en.wikipedia.org/wiki/Strace)'s log of file access. Although this is a little coarse, it does provide a list of outdated fixtures, new unadded tests and defunct tests to be removed/fixed. You probably want to `tee` this into a logfile.

<pre class="code">
<?php
define('TEST_BASE_PATH', realpath(realpath(dirname(__FILE__)) . '/../library/Mmf/Test/'));
define('SCRIPT_PATH', realpath(dirname(__FILE__)) . '/CommitTest.php');

echo SCRIPT_PATH,"\n";
echo "This is SLOW!\n";
$tmp = tempnam(sys_get_temp_dir(), "TestSuiteCoverage-");
$path = TEST_BASE_PATH;
$files = explode("\n",`find $path -type f`);
echo "Logging strace to $tmp\n";
passthru("strace -o $tmp -eopen -f php ".SCRIPT_PATH." ".escapeshellcmd(implode(' ',array_slice($argv,1))));

$lines = explode("\n",`cut -d \" -f 2 $tmp | grep $path | sort | uniq`);
$diff = array_diff($files,$lines);
echo count($lines), " files encountered of ", count($files), "; ", count($diff), " missing\n\n";
foreach($diff as $file) {
    echo "$file\n";
}
unlink($tmp);
</pre>

### Example output
<pre class="code">
php util_scripts/TestSuiteCoverage.php
/home/jon/build/Spam/util_scripts/CommitTest.php
This is SLOW!
Logging strace to /tmp/TestSuiteCoverage-z0EBOL

phpunit   /home/jon/build/Spam/util_scripts/../library/SpacelySprockets/Test/Suite/Integration/Frontend.php

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
301 files encountered of 362; 361 missing

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
</pre>
