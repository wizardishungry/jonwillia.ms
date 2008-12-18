<?php require_once('cookie.php');
national_treasure_starring_nicholas_cage(($_COOKIE[LOLSESSIONID]!=''&&$_SERVER[HTTP_REFERER]=='')?3:TRUE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    $taglines=Array(
        'The Wizard of IDDQD',
        'The Ancestral Home of the Croissanwich<sup>®</sup>',
        'As harmonious as a Pizza Hut<sup>®</sup>',
        'Valhalla, I am punning!',
    );
    $withlines=Array(
        'Eating Valencia oranges with',
        "Hiding out in vast natural cave systems with",
    );
    $tagline=$taglines[array_rand($taglines)];
    $withline=$withlines[array_rand($withlines)];
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>wizardishungry.com / <?php echo $withline; ?> Wizardishungry</title>
<link rel="stylesheet" href="include/style.css" type="text/css">
<link rel="alternate" title="FriendFeed" href="http://friendfeed.com/wizardishungry?format=atom" type="application/atom+xml"/>
<link rel="openid2.provider openid.server" href="http://pip.verisignlabs.com/server"/>
<link rel="openid2.local_id openid.delegate" href="http://WIZARDISHUNGRY.pip.verisignlabs.com"/>
<link rel="openid.server" href="https://pip.verisignlabs.com/server/" />
<link rel="openid.delegate" href="http://WIZARDISHUNGRY.pip.verisignlabs.com/" />
<meta http-equiv="X-XRDS-Location" content="http://pip.verisignlabs.com/user/WIZARDISHUNGRY/yadisxrds" />
<link rel="shortcut icon" href="include/icon.gif" />
<link rel="apple-touch-icon" href="/include/apple-touch-icon.png"/> 
<meta http-equiv="imagetoolbar" content="no" />
</head><body>
<?php if(FALSE): ?>
<div id="leftcolumn">
<!-- a place for secrets -->
</div>
<?php endif; ?>
<table id="pagetable">
<tbody><tr>
<td id="content">

<h1 class="bar">&nbsp;</h1>
<h1 class="tagline"><?php echo $tagline ?></h1>
<h1 class="title1"><?php echo $withline ?>…</h1>
<img class="splash" width="576" height="576" src="include/splash.jpg" alt="[O'Reilly-style image of an adorable Corgi]">
<h1 class="title2">Wizardishungry</h1>


<?php if(!preg_match('#(excepter)|(facebook.*event)#',$_SERVER['HTTP_REFERER'])): ?>

<h2>Introduction</h2>

<p>This is the somewhat transitional online home of <a href="mailto:jon@wizardishungry.com">Jon Williams</a></p>

<h2>What is there to do on this webpage?</a></h2>

<p>You probably want to go look at <s><a href="http://wizardishungry.wordpress.com/">my blog</a></s> <a href="http://wizardishungry.tumblr.com/">my tumblr</a> until I get
   everything else sorted out and relinked here. There's some other stuff that acquantences of mine
   might like to poke around at below.</p>

<h2>What have you been up to lately?</h2>

<p>Usually, <a href='#delicious'>my del.icio.us</a> or <a href="http://friendfeed.com/wizardishungry" rel="me">Friend Feed aggregator</a>
   are pretty good indicators of what I've been thinking about. Here's some stuff that I did recently pulled from there</p>

<script type="text/javascript" src="http://feeds.delicious.com/v2/js/WIZARDISHUNGRY/WIZARDISHUNGRY?count=5&sort=date&tags&extended"></script>

<p>I've been doing a lot of work in <a href="http://www.symfony-project.org/">Symfony</a> for the past two years and continue
   to do so. Currently I'm working an open source <a href="http://en.wikipedia.org/wiki/BitTorrent">BitTorrent</a> tracker 
   (<a href="http://github.com/WIZARDISHUNGRY/sflimetracker/tree/master">sfLimeTracker</a>)
   written in the <a href="http://www.symfony-project.org/"Symfony PHP framework</a> for 
   <a href="http://www.limewire.com/">Limewire</a>. I also try to contribute patches and support to Symfony and other free software
   projects as well as do internal web stuff at Limewire.</p>

<p>I have a new pet chicken blog here: <a href="http://khikin.com/">KHIKIN.com</a>.</p>

<h2>Is that a Corgi?</h2>

<p>Yes, that is a <a href="http://en.wikipedia.org/wiki/Pembroke_Welsh_Corgi">Pembroke Welsh Corgi</a>. I
   had two of them growing up and my parents have a pair back home. I remain
   <a href="http://www.flickr.com/photos/wizardishungry/sets/72157594187664253/">a big fan</a>.</p>

<a name="delicious"></a><script type="text/javascript" src="http://del.icio.us/feeds/js/WIZARDISHUNGRY?extended;count=10;title=My%20del.icio.us;bullet=%E2%80%A2;icon=s;name;showadd"></script>
<noscript><a href="http://del.icio.us/WIZARDISHUNGRY">My del.icio.us</a></noscript>


<h2>OMG more Widgets!<h2>

<a href="http://www.facebook.com/people/Jon_Williams/3700497" title="Jon Williams's Facebook profile" target=_TOP><img src="http://badge.facebook.com/badge/3700497.302.1982974835.png" border=0 alt="Jon Williams's Facebook profile"></a>

<script type="text/javascript" src="http://friendfeed.com/embed/badge/wizardishungry?hide_picture=1&amp;width=400"></script>

<!-- Start of Flickr Badge -->
<style type="text/css">
#flickr_badge_source_txt {padding:0; font: 11px Arial, Helvetica, Sans serif; color:#666666;}
#flickr_badge_icon {display:block !important; margin:0 !important; border: 1px solid rgb(0, 0, 0) !important;}
#flickr_icon_td {padding:0 5px 0 0 !important;}
.flickr_badge_image {text-align:center !important;}
.flickr_badge_image img {border: 1px solid black !important;}
#flickr_www {display:block; text-align:left; padding:0 10px 0 10px !important; font: 11px Arial, Helvetica, Sans serif !important; color:#3993ff !important;}
#flickr_badge_uber_wrapper a:hover,
#flickr_badge_uber_wrapper a:link,
#flickr_badge_uber_wrapper a:active,
#flickr_badge_uber_wrapper a:visited {text-decoration:none !important; background:inherit !important;color:#3993ff;}
#flickr_badge_wrapper {}
#flickr_badge_source {padding:0 !important; font: 11px Arial, Helvetica, Sans serif !important; color:#666666 !important;}
</style>
<table id="flickr_badge_uber_wrapper" cellpadding="0" cellspacing="10" border="0"><tr><td><a href="http://www.flickr.com" id="flickr_www">www.<strong style="color:#3993ff">flick<span style="color:#ff1c92">r</span></strong>.com</a><table cellpadding="0" cellspacing="10" border="0" id="flickr_badge_wrapper">
<tr>
<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?show_name=1&count=3&display=latest&size=t&layout=h&source=user&user=80228949%40N00"></script>
<td id="flickr_badge_source" valign="center" align="center">
<table cellpadding="0" cellspacing="0" border="0"><tr>
<td width="10" id="flickr_icon_td"><a href="http://www.flickr.com/photos/wizardishungry/"><img id="flickr_badge_icon" alt="WIZARDISHUNGRY's items" src="http://farm1.static.flickr.com/56/buddyicons/80228949@N00.jpg?1198015831#80228949@N00" align="left" width="48" height="48"></a></td>
<td id="flickr_badge_source_txt"><nobr>Go to</nobr> <a href="http://www.flickr.com/photos/wizardishungry/">WIZARDISHUNGRY's photostream</a></td>
</tr></table>
</td>
</tr>
</table>
</td></tr></table>
<!-- End of Flickr Badge -->

<div id="dopplr-WIZARDISHUNGRY-header-embed"><script type="text/javascript" src="http://www.dopplr.com/traveller/WIZARDISHUNGRY/public/07dc22391ba5226bff3c5c527f830a53/header.js"></script></div>

<h3 class="twitter-title"><a href="http://twitter.com/WIZARDISHUNGRY">Twitter</a></h2>
<ul id="twitter_update_list"></ul>
<a id="twitter-link" href="http://twitter.com/WIZARDISHUNGRY">follow me on Twitter</a>
<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/WIZARDISHUNGRY.json?callback=twitterCallback2&amp;count=5"></script>

<h2>Things That Formerly Existed</h2>

<p>Thanks to the wonders of the <a href="http://www.archive.org/web/web.php">Wayback Machine</a>, you can see a 
   few interesting snapshots of this page:</p>

<div id="versionlist" class="versionlist">

<h3>Blog frontpages layout</h3>

<p>All of the content that was available here was moved to a
   <a href="http://wizardishungry.wordpress.com/">WordPress.com blog</a> after I decided it was too tedious to
   maintain a blog install for what was eseentially a infrequently-updated “Tumblog” (I do not enjoy writing)
   and <a href="http://en.wikipedia.org/wiki/Grey_hat">grey hat</a> Technorati optimzation experiment. I
   <strong>promise</strong> I'll get the "Oregon Trail of Animated Gifs" up on my site somewhere.</p>

<h3>Older static pages</h3>
<ul>
<li><a href="http://web.archive.org/web/20061014044456/http://wizardishungry.com/">Oct 2006</a> Last Static layout
    (javascript+color+css intensive)</li>
<li><a href="http://web.archive.org/web/20061014044456/http://wizardishungry.com/">Nov 2005</a> Classic bigsplash with
    alpha-channel png</li>
<li><a href="http://web.archive.org/web/20040722190452/http://wizardishungry.com/">Jul 2004</a> Classic layout with different
    glyphs</a> choice of random characters was probably influenced by the font support in my then-current Linux
    distribution.
    <ul>
    <li><a href="http://web.archive.org/web/20040322034535/http://wizardishungry.com/">Broken seizure inducing
    subpage</a> (a little better in <a href="http://web.archive.org/web/20041009154036/wizardishungry.com/hotcar.html">
    Oct 2004</a>)</li>
    </ul></li>
<li><a href="http://web.archive.org/web/20040322034535/http://wizardishungry.com/">Mar 2004</a> Broken version of the classic
    blink+huge png layout</li>
<li><a href="http://web.archive.org/web/20030805160825/wizardishungry.com/">Aug 2003</a> Slightly more annoying CSS</li>
<li><a href="http://web.archive.org/web/20030424191836/http://wizardishungry.com/">Apr 2003</a> DHTML+CSS+&gt;BLINK&gt;</li>
<li><a href="http://web.archive.org/web/20030217055846/http://wizardishungry.com/">Feb 2003</a> Early synth experiment mp3
    page</li>
</ul>
<h3>My pages etc. predating this domain</h3>

<p>Like you'd want <a href="http://wizardishungry.wordpress.com/2007/01/13/hello_my_future_girlfriend_boy_surrives_transition_to_web_20_alive_and_well_on_myspace/">
   embarassing shit from when you were young</a> available for future employers and spouses?</a>

</div>
<?php endif;?>
<h1 class="authorlist">-<a href="mailto:jon@wizardishungry.com">Jon Williams</a></h1>
<hr>

<?php if(false): ?>
<p>HTML&amp;CSS stolen (with love) from <a href="http://svnbook.red-bean.com/">svn-book</a>
(<a href="http://creativecommons.org/licenses/by/2.0/" rel="license">creative commons license 2.0 [attrib]</a>)</p>

<p>Last-updated: <?php
$fs=stat(__FILE__);
$time=$fs['mtime'];
echo date(DATE_RFC2822,$time)
?></p>
<span id="bling">
Widescreen Rules!
</span>
<?php endif; ?>
</td>
</tr>
</tbody></table>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-938181-1";
urchinTracker();
</script>
</body></html>
