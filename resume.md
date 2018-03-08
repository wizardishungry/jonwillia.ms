---
layout: page
title: Resume
tagline: Web Technologist
group: "featured"
---
{% include JB/setup %}

<div class="contact">
  <p>
    {{ site.author.name }}<br />
    <i>{{ site.tagline }}</i><br />
    Brooklyn, NY<br />
    <a href='mailto:{{ site.author.email }}'>{{ site.author.email }}</a><br />
    <a href="{{ site.production_url }}">{{ site.production_url }}</a><br />
    <a href="http://github.com/{{ site.author.github }}/">github.com/{{ site.author.github }}</a>
  </p>
</div>
<div id="toc">

<ol>
  <li><a href="#technical-highlights">Objective</a></li>
  <li><a href="#experience">Experience</a></li>
  <li><a href="#education">Education</a></li>
  <li><a href="#skills">Skills</a></li>
</ol>
</div>

## Objective

I am currently seeking an engineering position in the New York City area at a technology-driven company that:

* utilizes modern software development methodologies – e.g. test-driven development, continuous delivery, DevOps, etc.
* <span title="I don't want another PHP role.">allows engineers to utilize modern technologies</span>.
* provides an informal, friendly, team-based environment.

## Experience

### Director of Engineering, [Bandwagon](http://bandwagon.io), Brooklyn, NY — 5/2016 - 10/2017. Consultant 10/2017 - present
_Engineering leadership for airport-based ridesharing startup._

* Took over entirety of engineering responsibilities after departure of previous engineering team.
* Managed existing systems architecture; utilizing Docker, Amazon Container Service/EC2, Heroku, MongoDB, Redis, etc.
* Development of RESTful services layer in Ruby on Rails, hosted on Heroku.
* Distributed systems engineering: utilizing Redis for locks/mutexes, and Sidekiq for asychonrous worker processes. Pub/sub architecture handled via PubNub.
* Development of existing taxi routing service layer - Java, OpenTripPlanner, Spring, hosted on AWS.
* Development of common codebase Cordova + Angular mobile website &amp; native app.
* Rebuilt native app in React Native with Redux.
* Supported production environment on Heroku &amp; Amazon Web Services.
* Collaborated with external taxi industry technical partners to integerate with multiple vendors' back-of-cab systems.
* Engineering of payments utilizing Stripe including fare allocation algorithms, credit card preauthorization strategies, &amp; reliability engineering.
* Embedded in product development process; collaborative feature design &amp; idea generation.
* Onboarded, mentored, &amp; supported junior engineers.

### Dev Team Lead, [Money-Media](http://www.money-media.com) / [Financial Times](http://www.ft.com/), New York, NY — 1/2013 - 4/2016
_Technical project leadership for 10+ subscription-only financial industry publications._

* Web Development
  * Architected cross-publication Single Sign On using OAuth2.
  * Development of front-end website using PHP, [Zend](http://framework.zend.com/) 1.12, MySQL and Doctrine.
  * Migrated PEAR-based packaging system to [Composer](http://www.getcomposer.org/)
  * Redesigned cache architecture to support A/B experiments.
  * Spearheaded web security analysis, developed Cross Site Scripting (XSS) and Cross Site Request Forgery protection for existing web sites.
  * Developed lightweight PDF-rendering microservice in [Coffeescript](http://www.coffeescript.org/) and [Node](http://www.nodejs.org/).
* Mobile Development
  * Rearchitected multiple iOS applications in Swift.
  * Led launch of 6 iOS tablet/phone applications for financial publications.
  * Launched rich media advertising (mRAID) using Google Publisher ads and native DoubleClick modules inside mobile applications.
  * Led mobile development projects on Android and iOS using [Appcelerator Titanium/Alloy](http://www.appcelerator.com/) cross-platform JavaScript framework.
* DevOps / Release Engineering
  * Responsible for release management, including packaging and coordination with operations staff.
  * Conversion of infrastructure to HTTPS; including Elastic Load Balancers, mobile applications, web service endpoints, and advertising creatives.
  * Supported continuous integration environment using Jenkins CI server.
* Team Leadership
  * Supported test-driven development practice within team; designed unit/integration test specifications for developers.
  * Mentored and managed developers on full-stack development.
  * Led code reviews and developer educaiton.
* Project Leadership
  * Worked closely with business analysts, QA, sales, advertising and editorial teams to best allocate technical resources for project cycles.
  * Implemented A/B testing including cross-publication experimentation.
  * Data integration with exta-organizational sites with Atom XML and CSV data feeds.
  * Integrated Google DoubleClick for Publishers across several publications including within mobile websites and apps.
  * Launched new publication allowing free subscription with registration while leveraging existing codebase ([FinancialAdvisorIQ.com](http://financialadvisoriq.com/)).

### Senior Developer, [Hollywood.com](http://www.hollywood.com/), New York, NY — 1/2012 - 10/2012
_Relaunched high-traffic celebrity news website._

* Development of site & CMS using [Symfony2](http://www.symfony.com/) PHP framework, [Doctrine](http://www.doctrine-project.org) PHP ORM, [jQuery](http://jquery.com/) Javascript framework.
* Built, utilized, & maintained test infrastructure using [Jenkins](http://jenkins-ci.org) continuous integration server and [PHPUnit](http://www.phpunit.de) test framework.
* Provisioned tiered architecture using [Varnish](https://www.varnish-cache.org) cache server w/ [Edge Side Includes](http://www.akamai.com/html/support/esi.html), MySQL, [Memcache](http://memcached.org), [APC](http://www.php.net/manual/en/book.apc.php) PHP Cache.
* Release engineering including patch / branch maintence in [Git](http://git-scm.com/), [Capistrano](https://github.com/capistrano/capistrano/) deployment automation and scripting.
* Architected high-performance web architecture utilizing [Amazon AWS](https://aws.amazon.com/) cloud services including [MySQL](http://www.mysql.com)/RDS, [Memcache](http://memcached.org)/Elasticache, Elastic Compute Cloud (EC2), & S3.
* Coordinated migration of Linux/MySQL assets from Rackspace / Rackspace Cloud to Amazon AWS EC3 / RDS.
* Automated systems administration &amp; operations using [Chef](http://www.opscode.com/chef/) [Ruby](http://www.ruby-lang.org/) systems integration framework on [Ubuntu](http://www.ubuntu.com/) Linux. Maintained and supported public key infrastructure.
* Developed automated system for building [VirtualBox](https://www.virtualbox.org) and updating virtual machine images. Supported worldwide freelance developers and rapid onboarding of engineering resources.
* Wrote specs for engineering positions; intimately involved in all technical hiring. Mentoring/support of junior &amp; frontend developers and remote freelancers.
* Integrated CMS with [Akamai](http://www.akamai.com/) & [Brightcove](http://www.brightcove.com/) Content Distribution Networks (CDN). Asset migration from Windows Server 2003 environment.
* Evaluation / documentation / integration of former employees' projects. Interfaced with contractor-developed iPad application via JSON.

### Software Engineer, [Xceedium](http://www.xceedium.com), Jersey City, NJ — 4/2011 – 12/2012
_Development of hardware security network appliance._

*	Maintained & enhanced GateKeeper Linux appliance using Agile process. Primary focus on [PHP](http://www.php.net/) web services & Javascript UI; other components included C-language daemons, Java applets, MySQL.
*	Designed and extended clustering to integrate in-house high availability functionality with recently acquired network password vault product replication ([JBoss](http://www.jboss.org/)).
*	Spearheaded web app security evaluation and hardening, CSRF protection design, PHP vulnerability assessment.
*	Prototype of Enterprise management console in [Symfony2](http://www.symfony.com/) PHP framework, [jQuery](http://jquery.com/), [Ontology Web Language](http://www.w3.org/TR/owl-features/) (OWL RDF/XML) backing store. Web-based ontology explorer.
*	Remote debugging of customer installations worldwide. Network protocol analysis using [Wireshark](http://www.wireshark.org).
*	Implementation of NIST [FIPS 140-2](http://csrc.nist.gov/publications/PubsFIPS.html) certified authenticated Network Time Protocol in product.

### Freelance Developer, Brooklyn, NY — 9/2009 – 4/2011
_Front-end, infrastructure & platform development for social media startup. [banters.com](https://www.banters.com/), etc. 1/2011 – 4/2011_

*	Self-directed development of new social features using [jQuery](http://jquery.com/) Javascript and in-house PHP5 framework.
*	Architected move to Amazon EC2 compute cloud / S3 content distribution network from generic Linux VPS.
* Rasterization of content to Tumblr via [PhantomJS](http://phantomjs.org) on EC2
* Installation/Maintenance of [WordPress](http://wordpress.org) blogs as CMS.

### Developer, [SeatGeek](http://www.seatgeek.com/), New York, NY — 3/2010 – 5/2010
_Front-end & infrastructure development for secondary ticketing market aggregator._

*	Developed PHP [Symfony](http://www.symfony.com/) website during period of rapid business development and user growth. Created web crawlers to scrap sports statistics from partner web sites across all major sports.
*	Reverse engineered Flex & Ajax APIs on third party web sites for aggregation of market transactions.
*	Predictive modeling / analytics of major league sports utilizing transaction data and sports statistics.
*	Developed embeddable Javascript widgets for revenue sharing partner sites from Yahoo! Sports all the way down to hobbyist bloggers.
*	Implemented and optimized geotargetting across main web site, partner widgets and email.
*	Managed interactions with freelancers including designers and coders. Evaluation and development of freelancer-coded Ruby / Watir / Firefox scraping system.

### Developer, [Limewire](http://limewire.com), New York, NY — 5/2008 – 9/2009
_Research &amp; development of innovative web &amp; BitTorrent apps utilizing and enhancing peer-to-peer technology. [github.com/WIZARDISHUNGRY/sflimetracker](https://github.com/WIZARDISHUNGRY/sflimetracker/)_

*	Developed LimeTracker open-source BitTorrent tracker / podcasting system in Symfony PHP framework. Tracker uses P2P to accelerate podcasts, reducing distribution costs.
*	Managed open source contributions and issue reporting via Git source control and JIRA bug tracker.
*	Developed software targeting commodity web hosts for “unzip and run installs”, in the vein of WordPress.
*	Worked to solve standardization problems in RSS and Atom-based podcasts.
*	Conceived SEO-directed internationalization and localization strategy for LimeWire website with aim of increasing purchase rates in overseas markets.
*	Maintained MediaWiki and PhpBB installations for Limewire.org community with ~90,000 accounts.
*	Evaluated replacement of LimeWire’s Java servlet for crash report handling in response to load issues during new release cycles.

### Web Programmer, [New York University - Steinhardt School of Culture, Education and Human Development](http://steinhardt.nyu.edu), New York, NY — 2/2006 – 5/2008
_Application/content team attached to dean of development; develops web apps and addresses marketing and academic technology._

*	Single handedly planned and developed unified content management system; gracefully migrating content from a cornucopia of older ad-hoc content management systems (Cold Fusion, Perl, PHP 4) to single unified CMS encompassing nearly a dozen distinct content types and their associated backend interface. System utilizes Symfony PHP framework to aid in rapid development and code reuse.
*	Developed CMS backend using Web 2.0 technologies; TinyMCE rich text editor, Prototype/Scriptaculous Javascript DHTML/Ajax enhancements; ensuring user-friendly and responsive access to content editing for 11 academic departments and 16 centers and institutes. Tag-based permissions system allows easy delegation of authority with flexible scope.
*	Member of core marketing/branding team that oversaw year-long renaming process of school and a comprehensive visual identity overhaul for both web and print. Worked to accommodate visual identities of departments within overall school, and university brands.
*	Created AJAX faculty bio editor that allowed inline layout and polling from sources ranging from RSS feeds to CMS news, accommodating the diverse requirements of 243+ full-time faculty members and allowing the reuse of web content in new contexts.
*	Ported open source [Kerberos V bindings for PHP version 4 to 5](http://cvs.savannah.nongnu.org/viewvc/phpkrb5/) for authentication against central NYU systems.
*	Participated in development of Symfony PHP web framework, contributing numerous bug reports and a number of patches; of note are patches for correct operation in FastCGI environment.
*	Worked closely with university IT Unix administrators to oversee server issues including MySQL optimization, Apache configuration and troubleshooting, and hardware lifecycle planning.
*	Implementation of version control (Subversion) and project management / bug tracking / wiki software (Trac) for web development team.
*	Aggregated university calendar feeds with Steinhardt utilizing iCalendar (.ics).
*	Devised custom student blog portal; integrated with university Moveable Type Enterprise install via RSS/Atom feeds; helped plan and implement all aspects of promotional student blog campaign.
*	Served as technical liaison to Dean’s Office, IT strategy, software and hardware purchasing.

### Web Developer, University of Rochester Web Group, Rochester, NY — 9/2003 - 5/2005
_Supports departmental web developers and provides development services within the University._

*	Primary developer for the University-wide web development  “deploy” system. System includes security and auditing capabilities. Took over design and programming; completed security audit, addressed critical scalability issues, and implemented major functionality and usability improvements for the 2.0 release.
*	Developed custom web applications (utilizing Apache, Php, MySQL, Solaris) for dozens of university departments, including a uniform graduate application system used across academic departments.
*	Provided consultation to management on issues related to the shared web server devlopment.

### Application Developer, MontegoNet LLC., Portsmouth, RI — 5/2002 - 1/2003, 5/2003 - 8/2003, 5/2004 - 8/2004
_Provides e-business consulting for kiosk and web-based applications._

*	Developed Internet kiosk architecture, including log processor, utilizing ASP/C#, SQL, and web services.
*	Integrated hardware sensors with kiosks using C++ and Windows serial device API.
*	Design and implement backend for kiosk electronic banking application w/ automated wire transfers.
*	Administered mail servers (Qmail/Red Hat Linux) and firewalls (OpenBSD, Cisco PIX).

### Systems Administrator / Programmer, George Patton Associates, LLC., Bristol, RI — 2/2003 - 4/2003
_Manufactures custom signage for small businesses; orders primarily placed online._

*	Maintained legacy UNIX ordering/production/inventory/shipping system (60,000+ lines of C, Perl and shell scripts) on modern Red Hat Linux system.
* Integrated shipping system with UPS package tracking.

## Education

### University of Rochester, Rochester, NY — Computer Science (B.S.), systems concentration, 2005.
Selected Courses:

* Parallel & Distributed Systems: (concurrency, Pthreads, MPI, etc.),
* Introduction to Cryptology (P2P, cipher design, public key, etc.)
* Programming Language Design & Implementation (final project: C compiler for JVM using [Apache BCEL](http://commons.apache.org/bcel/)
