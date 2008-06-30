<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Version Control with Subversion</title>
<link rel="stylesheet" href="include/styles.css" type="text/css">
</head><body>

<table id="pagetable">
<tbody><tr>
<td id="content">

<h1 class="bar">&nbsp;</h1>
<h1 class="tagline">The Ancestral Home of the Croissanwich<sup>®</sup></h1>
<h1 class="title1">Surfin the net with</h1>
<h1 class="title2">Wizardishungry</h1>


<!-- CONTENT STARTS -->

<h2>Introduction</h2>

<p>This is the online home of <span style="text-decoration: underline;">Version
   Control with Subversion</span>,
   a <a href="http://svnbook.red-bean.com/en/1.1/ape.html">free</a>
   book about <a href="http://subversion.tigris.org/">Subversion</a>, a
   new version control system designed to supplant CVS.  As you may
   have guessed from the layout of this page, this book is published by
   <a href="http://www.oreilly.com/catalog/0596004486/">O'Reilly Media</a>.</p>

<p>This is a place to
   read HTML and PDF versions of the book (although you can certainly
   <a href="http://svnbook.red-bean.com/buy/">buy</a> a copy if you'd like to).  We'll do our best
   to keep the site up-to-date.  As Subversion development continues, the
   product will continue to grow new features, and we plan to continue
   documenting those changes.</p>

<p style="background-color: yellow;"><strong>WE NEED YOUR
   HELP!</strong> Ben, Fitz and Mike are wrapping up final edits for
   the production of <span style="text-decoration: underline;">Version
   Control with Subversion, Second Edition</span>.  Your technical
   review of the book would be <em>most</em> helpful!  Please see <a href="http://www.red-bean.com/rbwiki/OnePointFiveTechReview">http://www.red-bean.com/rbwiki/OnePointFiveTechReview</a> for how
   you can help.</p>

<h2>Online Versions of the Book</h2>

<p>Here are the latest versions of the book which are available online:</p>

<div id="versionlist" class="versionlist">

<h3>For Subversion 1.4</h3>

<ul>
<li>View the <a href="http://svnbook.red-bean.com/en/1.4/index.html">multiple-page HTML edition</a>
    of the book.</li>
<li>View the <a href="http://svnbook.red-bean.com/en/1.4/svn-book.html">single-page HTML edition</a>
    of the book (1.2MB).</li>
<li>View the <a href="http://svnbook.red-bean.com/en/1.4/svn-book.pdf">PDF edition</a> of the book
    (1.4MB).</li>
<li>Download the <a href="http://svnbook.red-bean.com/en/1.4/svn-book-html.tar.bz2">single-page HTML edition</a> of the book in a <tt>.tar.bz2</tt> archive
    (~364KB).</li>
<li>Download the <a href="http://svnbook.red-bean.com/en/1.4/svn-book-html-chunk.tar.bz2">multiple-page HTML edition</a> of the book in a <tt>.tar.bz2</tt> archive
    (~380KB).</li>
<li>View the book's <a href="http://svnbook.red-bean.com/trac/browser/tags/en-1.4-final/src/en/book/">DocBook 
    XML sources</a>.</li>
</ul>

<h3>Nightly Build (for Subversion 1.5)</h3>
<p>Please bear in mind that these versions are works-in-progress: if you
bookmark or link to specific sections, those links may be invalidated by
continuing development. If you need a link that can be reasonably expected to
remain stable for years to come, link to one of the completed editions
below.</p>

<ul>
<li>View the <a href="http://svnbook.red-bean.com/nightly/en/index.html">multiple-page HTML edition</a>
    of the book.</li>
<li>View the <a href="http://svnbook.red-bean.com/nightly/en/svn-book.html">single-page HTML edition</a>
    of the book (1.1MB).</li>
<li>View the <a href="http://svnbook.red-bean.com/nightly/en/svn-book.pdf">PDF edition</a> of the book
    (1.3MB).</li>
<li>Download the <a href="http://svnbook.red-bean.com/nightly/en/svn-book-html.tar.bz2">single-page HTML edition</a> of the book in a <tt>.tar.bz2</tt> archive
    (~350KB).</li>
<li>Download the <a href="http://svnbook.red-bean.com/nightly/en/svn-book-html-chunk.tar.bz2">multiple-page HTML edition</a> of the book in a <tt>.tar.bz2</tt> archive
    (~350KB).</li>
<li>View the book's <a href="http://svnbook.red-bean.com/trac/browser/trunk/src/en/book/">DocBook 
    XML sources</a>.</li>
</ul>

</div>

<p>You can also find older versions of the book (which we suspect are
   no longer of much interest to most folks) <a href="http://svnbook.red-bean.com/old-versions.html">here</a>.</p>

<h2>Feedback/Contributing</h2>

<p>For feedback on the book or this website, contact
   <tt>svnbook-dev@red-bean.com</tt>
   [<a href="http://www.red-bean.com/mailman/listinfo/svnbook-dev">listinfo</a>].
   If you have spotted errors in the book (O'Reilly's hardcopy or
   otherwise), please do the following things:</p>

<ol>
<li>Check our <a href="http://svnbook.red-bean.com/trac/query?status=new&amp;status=assigned&amp;status=reopened">issue tracker</a> to see if someone else has already reported the
    same problem.  If so, there's nothing else to do, unless you wish
    to contribute a patch which fixes the problem (see below).</li>
<li>Check the XML sources to see if the problem still exists.  You can
    grab these using Subversion itself, by checking out the trunk of our
    Subversion repository at <tt>http://svn.red-bean.com/svnbook/trunk/</tt>.
    If the problem is present in the latest book sources, please
    report the problem to the mailing list above.</li>
<li>If the problem is in the published book, check O'Reilly's <a href="http://www.oreilly.com/catalog/0596004486/errata/">errata
    page</a> for the book, and report the error there if it hasn't
    already been reported.</li>
</ol>

<p>Reports of errors in the book are always welcome.  Reports of
   errors in the book which are accompanied by a suggested fix for the
   problem are even better.  For technical fixes (spelling, grammar,
   markup, etc.), just include with your error-reporting email a patch
   against the XML sources (and include the word <tt>[PATCH]</tt> in
   the subject line).  For more subjective concerns about the tone or
   comprehensibility of a passage, it's best just raise that topic on
   the mailing list.</p>

<h2>Translations</h2>

<p>This book has been (or is being) translated to other languages.
   Use the navigation menu at the bottom of the page to select a
   different language.  From each translated page you can get
   instructions on obtaining the translated book (or a
   work-in-progress snapshot if it is not finished yet).  Note that
   the English version is the master from which all translations
   derive, and if you have any comments about a translation you should
   contact that translation's authors.</p>

<!-- NON-ENGLISH TRANSLATION-SPECIFIC STUFF BEGINS -->

<!-- NON-ENGLISH TRANSLATION-SPECIFIC STUFF ENDS -->

<h2>Are Those Turtles?</h2>

<p>Why, yes, they are, indeed, turtles.  That's the animal chosen by
   the publisher for our book cover.  And before you ask us, "Why?"
   — we don't really know.  It's cool, and our wives are pleased
   that at least something "icky" wasn't chosen to represent
   Subversion.</p>

<!-- CONTENT ENDS -->

<h1 class="authorlist"><a href="mailto:jon@wizardishungry.com">Jon Williams</a></h1>

<hr>

<p>This page is also available in the following languages:<br>

<!-- For ease of maintenance, keep these sorted by language code.
     TRANSLATORS: titles here are in your native language; link text
     is in the language of the linked page. -->

   <a href="http://svnbook.red-bean.com/index.de.html" title="German" hreflang="de" rel="alternate" lang="de">deutsch</a> |
   <a href="http://svnbook.red-bean.com/index.es.html" title="Spanish" hreflang="es" rel="alternate" lang="es">español</a> |
   <a href="http://svnbook.red-bean.com/index.it.html" title="Italian" hreflang="it" rel="alternate" lang="it">Italiano</a> |
   <a href="http://svnbook.red-bean.com/index.ja.html" title="Japanese" hreflang="ja" rel="alternate" lang="ja">日本語</a> |
   <a href="http://svnbook.red-bean.com/index.nb.html" title="Norwegian" hreflang="nb" rel="alternate" lang="nb">norsk</a> |
   <a href="http://svnbook.red-bean.com/index.pt_BR.html" title="Portuguese" hreflang="pt-BR" rel="alternate" lang="pt-BR">Português</a> |
   <a href="http://svnbook.red-bean.com/index.ru.html" title="Russian" hreflang="ru" rel="alternate" lang="ru">Русский</a> |
   <a href="http://svnbook.red-bean.com/index.zh.html" title="Chinese" hreflang="zh" rel="alternate" lang="zh">中文</a> |
</p>

</td>
</tr>
</tbody></table>
</body></html>
