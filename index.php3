<html>
<head><title>Linux 2.4 Advanced Routing &amp; Traffic Control HOWTO</title></head>
<body bgcolor=#ffffff>

<table><tr><td>
<H1>Linux 2.4 Advanced Routing &amp; Traffic Control</H1>
</td><td valign=top><a href=http://www.powerdns.com><img
src=http://ds9a.nl/pub/pdns88x33c.gif></a></td>
</table>

<a href="http://ds9a.nl/">bert hubert</a> (<a
href=http://www.powerdns.com>PowerDNS.COM BV</a>) <a href=mailto:bert.hubert@netherlabs.nl>&lt;bert.hubert@netherlabs.nl&gt;</a>,<br>
<a href="http://linuxpower.cx/~greg/">Greg Maxwell</a> <a
href=mailto:greg@linuxpower.cx>&lt;greg@linuxpower.cx&gt;</a> and <br>
<a href=http://slashme.org>Remco van Mook</a> (<a
href=http://www.virtu.nl>Virtu Secure Webservices</a>) &lt;remco@virtu.nl&gt; <br>
Martijn van Oosterhout &lt;kleptog@cupid.suninternet.com&gt; <br>
Paul B Schroeder &lt;paulsch@us.ibm.com&gt; <br>
<a href="http://jsp.ds9a.nl/">Jasper Spaans</a> &lt;jasper@spaans.ds9a.nl&gt; <br>
<a href="mailto:HOWTO@ds9a.nl">HOWTO@ds9a.nl</a> (HOWTO) / 
<a href="mailto:LARTC@mailman.ds9a.nl">lartc@mailman.ds9a.nl</a> 
(<a href="#mailinglist">mailing list</a>)
<p>
<strong>Click <a href="#download">here</a> to download NOW!</strong>
<p>

Linux 2.4 has very advanced Routing, filtering and traffic shaping options.
This site attempts to document how to configure and use these features.

<p>
After some prodding by Rusty Russell, work started on the Advanced Routing
&amp; Traffic Shaping HOWTO. Rusty had also suggested writing a complete,
from the ground up, 2.4 Routing document. We attempted to do so but the
momentum lacked. We have therefore decided to concentrate on the advanced
HOWTO.

<h2>News</H2>
<table border=1>
<tr><td valign=top>2002-11-28</td><td>Lecture was given to a pretty full
room, read more about it <a
href=http://ds9a.nl/cbq-presentation>here</a>.</td>
<tr><td valign=top>2001-11-22</td><td>Mailinglist has been back for a while
and is in full swing again. Server broken again, due to crappy 1U case
design we are seeing CPU temperatures of 80C. In contact with vendor. Bert
Hubert will be giving a lecture about CBQ during this year's <a
href=http://www.linux-kongress.de>Linux Kongress</a>
, you need to <b>be there</b>. There will be a tremendous Netfilter/iptables presence!
</td>
<tr><td valign=top>2001-09-11</td><td><a
href=http://outpost.powerdns.com>New server</a>! If you can read this, it
works. Expect the mailinglist to return shortly.
</td>
<tr><td valign=top>2001-09-09</td><td><a href=/404.html>Server still
broken</a>,
supplier has so far managed to ship a broken system twice. New hardware has
just arrived, so we hope to be back soon.. Apologies for having the
mailinglist down for so long...

</td>
<tr><td valign=top>2001-07-17</td><td><a href=/404.html>Our server broke
down, badly</a>. Mailinglist defunct. Very unhappy</td>
<tr><td valign=top>2001-07-15</td><td>New <a href=autoloadbalance.php>tentative
document</a> about 'auto loadbalancing'. Might become a chapter, or a separate project one
day</td>
<tr><td valign=top>2001-07-13</td><td>Bert, Jasper and Remco will attend <a
href=http://www.hal2001.org>HAL2001</a>, a hackers conference. We're all in
the FHQ committee who are arranging for the 1gbit/s internet uplink on the
campground, we look forward to seeing you there!</td>

<tr><td valign=top>2001-03-11</td><td>Information on Path MTU Discovery
problems, and more obscure settings documented</td>
<tr><td valign=top>2001-02-09</td><td>Some new additions, but the major news
is that our PDFs finally look good! Get our Makefile and see how it is
done. To celebrate, we bumped the version number to 0.3.0.</td>
<tr><td>2000</td><td><a href=oldnews.html>Older news</a></td>
</table>
<a name="mailinglist"></a>
<H2>LARTC Mailinglist</H2>
It appears that the topic of our HOWTO is getting popular, so we decided to
start a mailinglist dedicated to discussions about advanced routing &amp;
shaping with Linux! 
<p>
The advent of the Linux Advanced Routing &amp; Traffic Control list also
means that questions asked privately will no longer be answered, as these
answers benefit only single users. Asking questions on the list is far more
net-friendly. So if you want to ask us a question, <a
href=http://mailman.ds9a.nl/mailman/listinfo/lartc>subscribe to the
mailinglist</a>, and ask it! An <a
href=http://mailman.ds9a.nl/pipermail/lartc/>archive</a> is also available,
and google has picked it up as well.
<p>
<font color=#ff0000>Please note that due to excessive spam the list has
become 'members only' - so please <a
href=http://mailman.ds9a.nl/mailman/listinfo/lartc>subscribe</a> first!</font>

<a name="download"></a>
<H2>Linux 2.4 Advanced Routing &amp; Traffic Control HOWTO</H2>
<p>
Current version is 0.3.0 Files were last updated at 
<?
	$st=stat("HOWTO/cvs/2.4routing/2.4routing.sgml");
	print date("Y-m-d H:i",$st[9]);
	print " CET ";

	printf("(ie, about %.1f hours ago). ",((time()-$st[9])/3600));
	if(((time()-$st[9])/3600)<1)
	{
		print "There has been a recent update - use of shift-reload".
		       " is advised!";
	}
?> 
<p>
The French version by Laurent Foucher and Philippe Latu from the 
<a href=http://www.linux-france.org/prj/inetdoc>
Technology Institute of the University of Toulouse</a>
plus Thierry Mallard and Yannick Quenec'hdu from 
<a href=http://www.idealx.com>
Idealx</a> is available <a
href=http://www.linux-france.org/prj/inetdoc/i/net/guides/2.4routingfr/>
here</a>. Terrific work! 
<p>
A Korean translation can be found on
<a href="http://www.gnukorea.org/2.4routing-kr/2.4routing.html">here</a>.

<ul>
<li><a href="HOWTO/cvs/2.4routing/cvs.log">CVS Changelog</a>, or view <a
href="/cgi-bin/viewcvs4.cgi/2.4routing">changes</a>
<li><a href="HOWTO/cvs/2.4routing/2.4routing.sgml">SGML</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.txt">ASCII</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing-howto.html">One-big-page HTML</A>
<li><a href="HOWTO//cvs/2.4routing/output/2.4routing.html">HTML</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.dvi">dvi</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.ps">ps</A>, <a href="HOWTO//cvs/2.4routing/2.4routing.ps.gz">ps.gz</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.pdf">pdf</A>, <a href="HOWTO//cvs/2.4routing/2.4routing.pdf.gz">pdf.gz</A>
(fixed, and now looking very spiffy!)
<li><a href="HOWTO//cvs/2.4routing/2.4routing.tar.gz">HTML tarfile</A>
</ul>
<H2>Jobs list</H2>
Like the Linux kernel, we have a jobs list. If you have any expertise
in any of these areas, please pitch in.
<ul>
<li>There are a *lot* of FIXME notices, so this means YOU!</li>
<li>Multicast routing</li>
<li>IPsec</li>
</ul>
<H2>Bazaar</H2>
This HOWTO is intended to be very much a <a
href="http://www.tuxedo.org/~esr/writings/cathedral-bazaar/">Bazaar</a> style development. If it

were to be any more open, bits would fall out. 
<p>
A CVS tree is available. try this:
<pre>
$ export CVSROOT=:pserver:anon@outpost.ds9a.nl:/var/cvsroot
$ cvs login
CVS password: [enter 'cvs' (without 's)]
$ cvs co 2.4routing
cvs server: Updating 2.4routing
U 2.4routing/2.4routing.sgml
</pre>

The idea is that this HOWTO will be a cooperative effort, much like the
Linux kernel itself. For the moment, we will be playing 'Linus', and we soon
hope to be joined by Alans, Daves, Ingos etcetera.
<p>

<a href=http://www.powerdns.com>
This site made possible by PowerDNS, for all your domain needs. 
</a>
<br>
<a href=http://ds9a.nl/>Other ds9a.nl projects.</a>
<!-- Search Google -->
<center>
<FORM method=GET action="http://www.google.com/search">
<TABLE bgcolor="#FFFFFF"><tr><td>
<A HREF="http://www.google.com/">
<IMG SRC="http://www.google.com/logos/Logo_40wht.gif" border="0"
ALT="Google" align="absmiddle"></A>
<INPUT TYPE=text name=q size=31 maxlength=255 value="">
<INPUT type=submit name=sa VALUE="Google Search">
</td></tr></TABLE>
</FORM>
</center>
<!-- Search Google -->
<center>
<small>
$Id$
</small>
</center>
</body>
</html>