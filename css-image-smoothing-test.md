---
layout: page
title: "CSS Image Smoothing Test"
description: "Explore upscaled images"
group: "featured"
---
{% include JB/setup %}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"> </script>
<style>
@keyframes myfirst
{
from {background: #00ff00;}
to {background: #ff00ff;}
}

@-moz-keyframes myfirst /* Firefox */
{
from {background: #00ff00;}
to {background: #ff00ff;}
}

@-webkit-keyframes myfirst /* Safari and Chrome */
{
from {background: #00ff00;}
to {background: #ff00ff;}
}

@-o-keyframes myfirst /* Opera */
{
from {background: #00ff00;}
to {background: #ff00ff;}
}
.raster { 
	image-rendering: optimizeSpeed;             /* FUCK SMOOTHING, GIVE ME SPEED  */
 	image-rendering: -moz-crisp-edges;          /* Firefox                        */
 	image-rendering: -o-crisp-edges;            /* Opera                          */
 	image-rendering: -webkit-optimize-contrast; /* Chrome (and eventually Safari) */
 	image-rendering: optimize-contrast;         /* CSS3 Proposed                  */
 	-ms-interpolation-mode: nearest-neighbor;   /* IE8+                           */
}
.bucket:hover  {
animation: myfirst 1s;
-moz-animation: myfirst 1s; /* Firefox */
-webkit-animation: myfirst 1s; /* Safari and Chrome */
-o-animation: myfirst 1s; /* Opera */
animation-iteration-count:infinite;
-moz-animation-iteration-count:infinite; /* Firefox */
-webkit-animation-iteration-count:infinite; /*Safari and Chrome*/
-o-animation-iteration-count:infinite; /* Opera */
}
.sandbox {
  border: 4px dashed;
  overflow:scroll;
  max-width: 100%;
  background: #eee;
  line-height: 0px;
  background:white
}
.playground a {
  background: white;
  color: blue;
}
.dark {
  background:black !important;
  color: white !important;
}
.sandbox.huge {
  position: absolute;
  left: 0px;
  width:100%;
}
.bucket {
  padding: 0;
  spacing: 0;
  margin: 0;
  overflow:scroll;
}
.sandbox span {
  line-height: 22pt;
}
</style>
Based on [this post by Nullsleep](http://nullsleep.tumblr.com/post/16417178705/how-to-disable-image-smoothing-in-modern-web-browsers). The top image should be pixelated; the bottom smoothed.
<form class="playground">
  <input class="url" type="text" name="url" value="http://www.google.com/images/srpr/logo3w.png" size="100" />
  <div class="sandbox">
<span>Click to zoom! Pan &amp; scroll! <a class="dark">Toggle BG!</a></span>
    <div class="bucket">
      <img class="img raster">
    </div><div class="bucket">
      <img class="img">
    </div>
  </div>
</form>
<script>
var zoom = 1;
var hash = window.location.hash.replace("#",'');
window.location.hash = hash;
if(hash) {
  $(".url").val(hash); 
}
var f = function() {
  zoom = 1;
  if(this.value) {
    val =this.value.replace("#",'');
    $(".playground .img").attr('src',val);
    window.location.replace('#','');
    window.location+=val;
  }
  c();
  return false;
}
var c = function() {
  zoom++;
  zoom%=8
  var zoom_real = 25 * Math.pow(2,zoom);
  if($.browser.webkit || $.browser.chrome) {
    $('.playground .img').css('zoom', zoom_real+"%");
  }
  else {
    $('.playground .img').css('width', "auto");
    $('.playground .img').css('width', ($('.raster').width() * zoom_real/100) + "px");
  }
  if( $('.raster').width() * zoom_real/100 >= $('.playground').width()-25 ) {
    $('.sandbox').addClass('huge');
  } else {
    $('.sandbox').removeClass('huge');
  }
}
$('.playground').submit(f);
$('.sandbox').click(c);
$(".sandbox").css("max-width", $(window).width()-10 + "px" );
$(".bucket").css("max-height", ($(window).height()-200)/2 + "px" );
$("input.url").change(f).change();
$(".dark").click(function(){$(".sandbox").toggleClass('dark'); $(this).toggleClass('dark'); return false; }); 
</script>
