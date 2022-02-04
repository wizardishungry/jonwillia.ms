---
layout: resume
title: Resume
#tagline: Polyglot Technologist
group: "not-featured"
class: "sans"
---
{% include JB/setup %}

<section>
<!--<h2>Objective</h2>-->
<p>
<!--<span class="marginnote">
  <strong>Jump to:</strong>
  <a href="#technical-highlights">Objective</a>
  <a href="#experience">Experience</a>
  <a href="#education">Education</a>
  <a href="#skills">Skills</a>
</span>-->
  <span class="marginnote">
    Brooklyn, NY<br />
    <a href='mailto:{{ site.author.email }}'>{{ site.author.email }}</a><br />
    <a href="{{ site.production_url }}">{{ site.production_url }}</a><br />
    <a href="http://github.com/{{ site.author.github }}/">https://github.com/{{ site.author.github }}</a>
  </span>
</p>
</section>

<section>
  <h2 id="experience">Experience</h2>

  <h3>
    Senior Software Engineer, <a href="https://istreamplanet.com/">iStreamPlanet</a> / Warner Media
  </h3>
  <p>
    <span class="marginnote">remote (Seattle, WA)<br>4/2020 - 2/2022</span>
    <em>Implementation of large scale OTT video streaming platforms.</em>
  </p>

  <ul>
    <li>Developer and operations work on Dash &amp; HLS video streaming infrastructure.</li>
    <li>Development of <a href="https://www.go-lang.org/">Go</a> services inside Kubernetes.</li>
    <li>AWS, Google Compute Platform</li>
    <li>Kinesis, Redis, GRPC</li>
  </ul>

  <h3>
    Senior Backend Engineer, <a href="https://stocktwits.com/">StockTwits</a><br>
    Backend Technical Lead, Trade App
  </h3>
  <p>
    <span class="marginnote">New York, NY<br>6/2018 - 1/2020 </span>
    <em>Scalable service design and development for financial social network and brokerage.</em>
  </p>

  <ul>
    <li>Backend architecture and implementation of mobile-first brokerage. Led backend team from conception to launch.</li>
    <li>Development of <a href="https://www.go-lang.org/">Go</a> services in both Kubernetes &amp; Serverless (AWS Lambda + CloudFormation) deployments.</li>
    <li>Design and implementation of high performance pub/sub realtime stock quotes service (Golang / Lambda / ECS).</li>
    <li>Developer tooling and automation: utilized Serverless.com and AWS to allow developers to easily spin up personal environments off of arbitrary git branches.</li>
    <li>Distributed / serverless architecture design and implementation <ul>
      <li>Ingestion of partner event streams over websockets.</li>
      <li>Asynchronous event processing using lambdas consuming DynamoDB Kinesis streams.</li>
      <li>Distributing messaging using Apache Kafka, MQTT, &amp; Amazon SQS.</li>
    </ul></li>
    <li>Cloud data storage using AWS DynamoDB, S3, RDS (Postgres), Elasticache (Redis), etc.</li>
    <li>Test driven development using Docker automation for datastore integration testing.</li>
    <li>Agile software development with distributed teams.</li>
    <li>API engineering using Protobuf RPC endpoints (Twirp) on top of API Gateway.</li>
  </ul>

  <h3>Director of Engineering, <a href="http://bandwagon.io">Bandwagon</a></h3>
  <p>
    <span class="marginnote">
      Brooklyn, NY<br>5/2016 - 10/2017<br>Consultant 10/2017 - 5/2018
    </span>
  <em>Engineering leadership for airport-based ridesharing startup.</em></p>

  <ul>
    <li>Took over entirety of engineering responsibilities after departure of previous engineering team.</li>
    <li>Managed existing systems architecture; utilizing Docker, Amazon Container Service/EC2, Heroku, MongoDB, Redis, etc.</li>
    <li>Development of RESTful services layer in Ruby on Rails, hosted on Heroku.</li>
    <li>Distributed systems engineering: utilizing Redis for locks/mutexes, and Sidekiq for asynchronous worker processes. Pub/sub architecture handled via PubNub.</li>
    <li>Development of existing taxi routing service layer - Java, OpenTripPlanner, Spring, hosted on AWS.</li>
    <li>Development of common codebase Cordova + Angular mobile website &amp; native app.</li>
    <li>Rebuilt native app in React Native with Redux.</li>
    <li>Supported production environment on Heroku &amp; Amazon Web Services.</li>
    <li>Collaborated with external taxi industry technical partners to integrate with multiple vendors’ back-of-cab systems.</li>
    <li>Engineering of payments utilizing Stripe including fare allocation algorithms, credit card preauthorization strategies, &amp; reliability engineering.</li>
    <li>Embedded in product development process; collaborative feature design &amp; idea generation.</li>
    <li>Onboarded, mentored, &amp; supported junior engineers.</li>
  </ul>



  <h3>Development Team Lead, <a href="http://www.money-media.com">Money-Media</a> / <a href="http://www.ft.com/">Financial Times</a></h3>
  <p>
    <span class="marginnote">New York, NY<br>1/2013 - 4/2016</span>
    <em>Technical project leadership for 10+ subscription-only financial industry publications.</em>
  </p>

  <ul>
    <li>Web Development
      <ul>
        <li>Architected cross-publication Single Sign On using OAuth2.</li>
        <li>Development of front-end website using PHP, <a href="http://framework.zend.com/">Zend</a> 1.12, MySQL and Doctrine.</li>
        <li>Migrated PEAR-based packaging system to <a href="http://www.getcomposer.org/">Composer</a>.</li>
        <li>Redesigned cache architecture to support A/B experiments.</li>
        <li>Spearheaded web security analysis, developed Cross Site Scripting (XSS) and Cross Site Request Forgery protection for existing web sites.</li>
        <li>Developed lightweight PDF-rendering microservice in <a href="http://www.coffeescript.org/">Coffeescript</a> and <a href="http://www.nodejs.org/">Node</a>.</li>
      </ul>
    </li>
    <li>Mobile Development
      <ul>
        <li>Rearchitected multiple iOS applications in Swift.</li>
        <li>Led launch of 6 iOS tablet/phone applications for financial publications.</li>
        <li>Launched rich media advertising (mRAID) using Google Publisher ads and native DoubleClick modules inside mobile applications.</li>
        <li>Led mobile development projects on Android and iOS using <a href="http://www.appcelerator.com/">Appcelerator Titanium/Alloy</a> cross-platform JavaScript framework.</li>
      </ul>
    </li>
    <li>DevOps / Release Engineering
      <ul>
        <li>Responsible for release management, including packaging and coordination with operations staff.</li>
        <li>Conversion of infrastructure to HTTPS; including Elastic Load Balancers, mobile applications, web service endpoints, and advertising creatives.</li>
        <li>Supported continuous integration environment using Jenkins CI server.</li>
      </ul>
    </li>
    <li>Team Leadership
      <ul>
        <li>Supported test-driven development practice within team; designed unit/integration test specifications for developers.</li>
        <li>Mentored and managed developers on full-stack development.</li>
        <li>Led code reviews and developer education.</li>
      </ul>
    </li>
    <li>Project Leadership
      <ul>
        <li>Worked closely with business analysts, QA, sales, advertising and editorial teams to best allocate technical resources for project cycles.</li>
        <li>Implemented A/B testing including cross-publication experimentation.</li>
        <li>Data integration with extra-organizational sites with Atom XML and CSV data feeds.</li>
        <li>Integrated Google DoubleClick for Publishers across several publications including within mobile websites and apps.</li>
        <li>Launched new publication allowing free subscription with registration while leveraging existing codebase (<a href="http://financialadvisoriq.com/">FinancialAdvisorIQ.com</a>).</li>
      </ul>
    </li>
  </ul>


  <h3>Founder, <a href="https://bongo.zone/">Pulsum Quadratum</a></h3>
  <p>
    <span class="marginnote">Brooklyn, NY<br>1/2018 - </span>
    <em>Design &amp; development of experimental audio software.</em>
  </p>

  <ul>
    <li>Sole founder – business conceived as a small-scale means to earn money while enjoying passion for music.</li>
    <li>Design and implementation of novel audio software techniques in C/C++.</li>
    <li>Audio plugin development on Windows/Mac/Linux for the <a href="https://www.vcvrack.com/">VCVRack</a> synthesis environment.</li>
    <li>Negotiation of software licensing / distribution with partners.</li>
    <li>Active participation in open source engineering related to audio technologies.</li>
  </ul>
  
  <h3>Senior Developer, <a href="http://www.hollywood.com/">Hollywood.com</a></h3>
  <p>
    <span class="marginnote">New York, NY<br>1/2012 - 10/2012</span>
    <em>Relaunched high-traffic celebrity news website.</em>
  </p>

  <ul>
    <li>Development of site &amp; CMS using <a href="http://www.symfony.com/">Symfony2</a> PHP framework, <a href="http://www.doctrine-project.org">Doctrine</a> PHP ORM, <a href="http://jquery.com/">jQuery</a> Javascript framework.</li>
    <li>Built, utilized, &amp; maintained test infrastructure using <a href="http://jenkins-ci.org">Jenkins</a> continuous integration server and <a href="http://www.phpunit.de">PHPUnit</a> test framework.</li>
    <li>Provisioned tiered architecture using <a href="https://www.varnish-cache.org">Varnish</a> cache server w/ <a href="http://www.akamai.com/html/support/esi.html">Edge Side Includes</a>, MySQL, <a href="http://memcached.org">Memcache</a>, <a href="http://www.php.net/manual/en/book.apc.php">APC</a> PHP Cache.</li>
    <li>Release engineering including patch / branch maintenance in <a href="http://git-scm.com/">Git</a>, <a href="https://github.com/capistrano/capistrano/">Capistrano</a> deployment automation and scripting.</li>
    <li>Architected high-performance web architecture utilizing <a href="https://aws.amazon.com/">Amazon AWS</a> cloud services including <a href="http://www.mysql.com">MySQL</a>/RDS, <a href="http://memcached.org">Memcache</a>/Elasticache, Elastic Compute Cloud (EC2), &amp; S3.</li>
    <li>Coordinated migration of Linux/MySQL assets from Rackspace / Rackspace Cloud to Amazon AWS EC3 / RDS.</li>
    <li>Automated systems administration &amp; operations using <a href="http://www.opscode.com/chef/">Chef</a> <a href="http://www.ruby-lang.org/">Ruby</a> systems integration framework on <a href="http://www.ubuntu.com/">Ubuntu</a> Linux. Maintained and supported public key infrastructure.</li>
    <li>Developed automated system for building <a href="https://www.virtualbox.org">VirtualBox</a> and updating virtual machine images. Supported worldwide freelance developers and rapid onboarding of engineering resources.</li>
    <li>Wrote specs for engineering positions; intimately involved in all technical hiring. Mentoring/support of junior &amp; frontend developers and remote freelancers.</li>
    <li>Integrated CMS with <a href="http://www.akamai.com/">Akamai</a> &amp; <a href="http://www.brightcove.com/">Brightcove</a> Content Distribution Networks (CDN). Asset migration from Windows Server 2003 environment.</li>
    <li>Evaluation / documentation / integration of former employees’ projects. Interfaced with contractor-developed iPad application via JSON.</li>
  </ul>

  <h3>Software Engineer, <a href="http://www.xceedium.com">Xceedium</a></h3>
  <p>
    <span class="marginnote">Jersey City, NJ<br>4/2011 – 12/2011</span>
    <em>Development of hardware security network appliance.</em>
  </p>

  <ul>
    <li>Maintained &amp; enhanced GateKeeper Linux appliance using Agile process. Primary focus on <a href="http://www.php.net/">PHP</a> web services &amp; Javascript UI; other components included C-language daemons, Java applets, MySQL.</li>
    <li>Designed and extended clustering to integrate in-house high availability functionality with recently acquired network password vault product replication (<a href="http://www.jboss.org/">JBoss</a>).</li>
    <li>Spearheaded web app security evaluation and hardening, CSRF protection design, PHP vulnerability assessment.</li>
    <li>Prototype of Enterprise management console in <a href="http://www.symfony.com/">Symfony2</a> PHP framework, <a href="http://jquery.com/">jQuery</a>, <a href="http://www.w3.org/TR/owl-features/">Ontology Web Language</a> (OWL RDF/XML) backing store. Web-based ontology explorer.</li>
    <li>Remote debugging of customer installations worldwide. Network protocol analysis using <a href="http://www.wireshark.org">Wireshark</a>.</li>
    <li>Implementation of NIST <a href="http://csrc.nist.gov/publications/PubsFIPS.html">FIPS 140-2</a> certified authenticated Network Time Protocol in product.</li>
  </ul>

  <h3>Freelance Developer</h3>
  <p>
    <span class="marginnote">Brooklyn, NY<br>9/2009 – 4/2011</span>
    <em>Front-end, infrastructure &amp; platform development for social media startup, e.g. <a href="https://www.banters.com/">banters.com</a></em>
  </p>

  <ul>
    <li>Self-directed development of new social features using <a href="http://jquery.com/">jQuery</a> Javascript and in-house PHP5 framework.</li>
    <li>Architected move to Amazon EC2 compute cloud / S3 content distribution network from generic Linux VPS.</li>
    <li>Rasterization of content to Tumblr via <a href="http://phantomjs.org">PhantomJS</a> on EC2</li>
    <li>Installation/Maintenance of <a href="http://wordpress.org">WordPress</a> blogs as CMS.</li>
  </ul>

  <h3>Developer, <a href="http://www.seatgeek.com/">SeatGeek</a></h3>
  <p>
    <span class="marginnote">New York, NY<br>3/2010 – 5/2010</span>
    <em>Front-end &amp; infrastructure development for secondary ticketing market aggregator.</em>
  </p>

  <ul>
    <li>Developed PHP <a href="http://www.symfony.com/">Symfony</a> website during period of rapid business development and user growth. Created web crawlers to scrap sports statistics from partner web sites across all major sports.</li>
    <li>Reverse engineered Flex &amp; Ajax APIs on third party web sites for aggregation of market transactions.</li>
    <li>Predictive modeling / analytics of major league sports utilizing transaction data and sports statistics.</li>
    <li>Developed embeddable Javascript widgets for revenue sharing partner sites from Yahoo! Sports all the way down to hobbyist bloggers.</li>
    <li>Implemented and optimized geotargetting across main web site, partner widgets and email.</li>
    <li>Managed interactions with freelancers including designers and coders. Evaluation and development of freelancer-coded Ruby / Watir / Firefox scraping system.</li>
  </ul>

  <h3>Developer, <a href="http://limewire.com">Limewire</a></h3>
  <p>
    <span class="marginnote">New York, NY<br>5/2008 – 9/2009</span>
    <em>Research &amp; development of innovative web &amp; BitTorrent apps utilizing and enhancing peer-to-peer technology.</em>
    <ul>
      <li>
      Developed LimeTracker<label for="sn-demo" class="margin-toggle sidenote-number"></label><input type="checkbox"
       id="sn-demo"
       class="margin-toggle"/>
      <span class="sidenote"><a href="https://github.com/WIZARDISHUNGRY/sflimetracker/">source code on github</a>
      </span>
      open-source BitTorrent tracker / podcasting system in Symfony PHP framework. Tracker uses P2P to accelerate podcasts, reducing distribution costs.
      </li>
      <li>Managed open source contributions and issue reporting via Git source control and JIRA bug tracker.</li>
      <li>Developed software targeting commodity web hosts for “unzip and run installs”, in the vein of WordPress.</li>
      <li>Worked to solve standardization problems in RSS and Atom-based podcasts.</li>
      <li>Conceived SEO-directed internationalization and localization strategy for Limewire website with aim of increasing purchase rates in overseas markets.</li>
      <li>Maintained MediaWiki and PhpBB installations for Limewire.org community with ~90,000 accounts.</li>
      <li>Evaluated replacement of Limewire’s Java servlet for crash report handling in response to load issues during new release cycles.</li>
    </ul>
  </p>
<!--
  <h3>Web Programmer, <a href="http://steinhardt.nyu.edu">NYU Steinhardt</a></h3>
  <p>
    <span class="marginnote">New York, NY<br>2/2006 – 5/2008</span>
    <em>Application/content team attached to dean of development; develops web apps and addresses marketing and academic technology.</em></p>

  <ul>
    <li>Single handedly planned and developed unified content management system; gracefully migrating content from a cornucopia of older ad-hoc content management systems (Cold Fusion, Perl, PHP 4) to single unified CMS encompassing nearly a dozen distinct content types and their associated backend interface. System utilizes Symfony PHP framework to aid in rapid development and code reuse.</li>
    <li>Developed CMS backend using Web 2.0 technologies; TinyMCE rich text editor, Prototype/Scriptaculous Javascript DHTML/Ajax enhancements; ensuring user-friendly and responsive access to content editing for 11 academic departments and 16 centers and institutes. Tag-based permissions system allows easy delegation of authority with flexible scope.</li>
    <li>Member of core marketing/branding team that oversaw year-long renaming process of school and a comprehensive visual identity overhaul for both web and print. Worked to accommodate visual identities of departments within overall school, and university brands.</li>
    <li>Created AJAX faculty bio editor that allowed inline layout and polling from sources ranging from RSS feeds to CMS news, accommodating the diverse requirements of 243+ full-time faculty members and allowing the reuse of web content in new contexts.</li>
    <li>Ported open source <a href="http://cvs.savannah.nongnu.org/viewvc/phpkrb5/">Kerberos V bindings for PHP version 4 to 5</a> for authentication against central NYU systems.</li>
    <li>Participated in development of Symfony PHP web framework, contributing numerous bug reports and a number of patches; of note are patches for correct operation in FastCGI environment.</li>
    <li>Worked closely with university IT Unix administrators to oversee server issues including MySQL optimization, Apache configuration and troubleshooting, and hardware lifecycle planning.</li>
    <li>Implementation of version control (Subversion) and project management / bug tracking / wiki software (Trac) for web development team.</li>
    <li>Aggregated university calendar feeds with Steinhardt utilizing iCalendar (.ics).</li>
    <li>Devised custom student blog portal; integrated with university Moveable Type Enterprise install via RSS/Atom feeds; helped plan and implement all aspects of promotional student blog campaign.</li>
    <li>Served as technical liaison to Dean’s Office, IT strategy, software and hardware purchasing.</li>
  </ul>

  <h3>Web Developer, University of Rochester Web Group</h3>
  <p>
  <span class="marginnote">Rochester, NY<br>9/2003 - 5/2005</span>
  <em>Supports departmental web developers and provides development services within the University.</em></p>

  <ul>
    <li>Primary developer for the University-wide web development  “deploy” system. System includes security and auditing capabilities. Took over design and programming; completed security audit, addressed critical scalability issues, and implemented major functionality and usability improvements for the 2.0 release.</li>
    <li>Developed custom web applications (utilizing Apache, Php, MySQL, Solaris) for dozens of university departments, including a uniform graduate application system used across academic departments.</li>
    <li>Provided consultation to management on issues related to the shared web server development.</li>
  </ul>

  <h3>Application Developer, MontegoNet LLC.</h3>
  <p>
  <span class="marginnote">Portsmouth, RI<br>5/2002 - 8/2004</span>
  <em>Provides e-business consulting for kiosk and web-based applications.</em></p>

  <ul>
    <li>Developed Internet kiosk architecture, including log processor, utilizing ASP/C#, SQL, and web services.</li>
    <li>Integrated hardware sensors with kiosks using C++ and Windows serial device API.</li>
    <li>Design and implement backend for kiosk electronic banking application w/ automated wire transfers.</li>
    <li>Administered mail servers (Qmail/Red Hat Linux) and firewalls (OpenBSD, Cisco PIX).</li>
  </ul>
  -->

</section>
<section>
  <h2 id="education">Education</h2>
  <h3>University of Rochester, Rochester, NY — Computer Science (B.S.), systems concentration</h3>
  <p>Selected Courses:</p>

  <ul>
    <li>Parallel &amp; Distributed Systems: (concurrency, Pthreads, MPI, etc.),</li>
    <li>Introduction to Cryptology (P2P, cipher design, public key, etc.)</li>
    <li>Programming Language Design &amp; Implementation (final project: C compiler for JVM using <a href="http://commons.apache.org/bcel/">Apache BCEL</a></li>
  </ul>
<section>
