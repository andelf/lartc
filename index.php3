<html>
<head><title>Linux Advanced Routing &amp; Traffic Control HOWTO</title>
<LINK REL="SHORTCUT ICON" HREF="/tux16-16.ico">
</head>
<body bgcolor=#ffffff>

<table width=100%><tr><td width=80%>
<H1>Linux Advanced Routing &amp; Traffic Control</H1>
</td><td></td><td valign=top align=right><a href=http://www.powerdns.com><img
src=http://ds9a.nl/pub/pdns88x33c.gif></a><p></td>

<tr><td><a href="http://ds9a.nl/">bert hubert</a> (<a
href=http://www.powerdns.com>PowerDNS.COM BV</a>) ,<br>
<table><tr valign=top><td>
Section authors: </td>
<td>
<a href="http://tgr.kaosu.ch/">Thomas Graf</a>, 
<a href="http://linuxpower.cx/~greg/">Greg Maxwell</a> <a
href=mailto:greg@linuxpower.cx></a>, 
<a href=http://slashme.org>Remco van Mook</a> (<a
href=http://www.virtu.nl>Virtu Secure Webservices</a>) <br>
Martijn van Oosterhout,
Paul B Schroeder,
<a href="http://jsp.ds9a.nl/">Jasper Spaans</a>,
Pedro Larroy
</td></table>
<br>
<a href="mailto:send-mail-to-the-mailinglist-not-to-the-HOWTO-authors-unless-you-have-a-complaint-or-patch-about-the-HOWTO!@ds9a.nl">HOWTO@ds9a.nl</a> <small>(HOWTO related only, do
<strong>not</strong> send questions)</small> <br>
<a href="#mailinglist">lartc@mailman.ds9a.nl</a>
(<small>mailing list</a>/<a
href=http://mailman.ds9a.nl/pipermail/lartc/>archive</a>, the <strong>only</strong> place to send
questions!</a>)<br>
(<font color=#ff0000><a href=#mailinglist>subscribe</a> before posting!</font>)<br></small>
#lartc on <a href=http://www.oftc.net>irc.oftc.net</a> (<a
href=dejairc.php>archives</a>)</td><td valign=bottom align=right>

</td>
<td valign=top>Translations:
<br>
<a href=LARTC-zh_CN.GB2312.pdf>[ Chinese (zh_CN.GB2312) ] </a> <br>
<a
href=http://www.linux-france.org/prj/inetdoc/guides/Advanced-routing-Howto/>

	[ French ]</a> (fixed)
<br><a href="http://www.gnukorea.org/">
	[ Korean ]</a>
<br>
<a
href=http://mr0vka.eu.org/docs/tlumaczenia/2.4routing/index.html>
	[ Polish ]
</a>
<p>
<table bgcolor=#ff0000><tr><td>
<a href=wondershaper><font color=#ffffff>ADSL/Cable Wondershaper!</a>
</td></table>
</td>
</table>
<center>
<table border=1>
<tr>
<td><a href="#news">News</a> </td>
<td><a href="#mailinglist">Mailinglist</a> </td>
<td><strong><a href="#download">Download</a></strong></td>
<td><a href=manpages/>Manpages</a></td>
<td><strong><a href=howto><font color=#ff0000>Dive
in!</font></a></strong>
<td><a href="#jobs">Jobs</a> </td>
<td><a href="#bazaar">Bazaar</a></td>
<td><a href="#sponsor">Sponsor</a>
</td></tr>
</table>
Massive thanks to:<br>
<small>
<?
readfile("/home/ahu/content/lartc/cvs/2.4routing/contriblist");
?>
</small></center>
<p>

Linux has very advanced Routing, filtering and traffic shaping options.
This site attempts to document how to configure and use these features.

<a name="news"></a>
<h2>News</H2>
<table border=1>
<tr><td valign=top>2003-07-26</td><td>
Started updating several sections based on the massive amount of email that
concerned readers keep sending me, thanks! Added Thomas Graf as a section
author in recognition for his work on the OSPF and BGP chapters.
</td></tr>
<tr><td valign=top>2002-11-00</td><td>
A spanish translation is appearing  <a href=http://midgard.heimy.org/~javi/asgard/lartc/>here</a>.</td></tr>
<tr><td valign=top>2002-11-08</td><td>IPSEC IN LINUX 2.5.47! Read all about
it <a href=http://lartc.org/howto/lartc.ipsec.html>here</a>.</td></tr>
<tr><td valign=top>2002-07-20</td><td>Hate so called 'opt-in' spam? Visit 
<a href=http://www.intuh.net/opt-out/>this page</a> or the <a
href=http://ds9a.nl/mirrors/opt-out/>local mirror</a>. Even better, submit
addresses of known opt-in spam supporters!</td>
<tr><td valign=top>2002-07-07</td><td>Moved the IRC channel #lartc to
irc.oftc.net - a very down to earth IRC network without operators begging
for financial support. If you are new to IRC, give it a try. An excellent
irc client is <a href=http://www.irssi.org>irssi</a>. IRC archives
will be back soon!</td>
<tr><td valign=top>2002-06-29</td><td><a
href=http://linuxsymposium.org/2002>Ottawa Linux Symposium 2002</a>
presentation <a href=http://ds9a.nl/ols-presentation>Linux Traffic Control
for the User and Developer</a> online!</td>
<tr><td valign=top>2002-05-15</td><td>Finally replaced the malfunctioning
server. Thanks to <a href=http://www.puddingonline.com/~dave>Dave
Aaldering</a> of <a href=http://www.hubris.nl>Hubris</a> we quickly found a
<a
href=http://commerce.www.ibm.com/cgi-bin/ncommerce/CategoryDisplay?cgrfnbr=2072547&smrfnbr=2072488&cntrfnbr=1&cgmenbr=1&cntry=840&lang=en_US&scrfnbr=73>
new</a> <a href=http://outpost.ds9a.nl>one</a>. We are very confident that we will now be up &gt;99%.</td>
<tr><td valign=top>2002-04-15</td><td><a href=wondershaper/>Wondershaper
1.1</a> released</td>
<tr><td valign=top>2002-04-11</td><td>Thanks to <a
href=http://www.student.kun.nl/a.vanleeuwen/index-en.html>Arthur van
Leeuwen</a> we finally have <a
href=http://lartc.org/howto/lartc.rpdb.multiple-links.html>
a good section on how to combine multiple
internet links succesfully</a>. Today is also <font color=#ff0000>FLAG
DAY!</font> I've shifted to DocBook and all 'deep links' are now dead. 
The good news is that DocBook has features to make deep links more robust, 
so expect some nice URLs soon.</a></td>
<tr><td valign=top>2002-03-15</td><td>Psssst! Sneak preview of what I've
been doing the past year and a half or so: the <a
href=http://pdns.powerdns.com>PowerDNS not-for-profit release</a>. In other
news, the tea crisis has subsided. Family went to the UK and brought a
year's supply of tea.</td>
<tr><td valign=top>2002-03-10</td><td>Started migration to DocBook! I think
the <a href=lartc.pdf>PDF</a> looks a lot better. The <a
href=docbook-html>HTML</a> isn't bad either. <a href=lartc.txt>Text</a> needs
some work though. Let <a href=mailto:ahu@ds9a.nl>me</a> know what you think!</td>


<tr><td>200[012]</td><td><a href=oldnews.html>Older news</a></td>
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
The moderator will not approve postings from non-subscribed addresses as he
is not available at all times. If you just want to post, and not receive
mail, you can indicate this on the Mailman mailinglist management page.

<a name="download"></a>
<H2>Linux Advanced Routing &amp; Traffic Control HOWTO</H2>
<p>
Current version is 1.0.0 Files were last updated at 
<?
	if(!($st=stat("lartc.db")))
		$st=stat("lartc.db");
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
The French
 version by Laurent Foucher and Philippe Latu from the 
<a href=http://www.linux-france.org/prj/inetdoc>
Technology Institute of the University of Toulouse</a>
plus Thierry Mallard and Yannick Quenec'hdu from 
<a href=http://www.idealx.com>
Idealx</a> is available <a href=http://www.linux-france.org/prj/inetdoc/guides/Advanced-routing-Howto>
here</a>. Terrific work! 
<p>
A Korean translation can be found on
<a href="http://www.gnukorea.org/2.4routing-kr/2.4routing.html">here</a>.
<p>
Polish translation is <a
href=http://mr0vka.eu.org/tlumaczenia/2.4routing.html>here</a>.
<ul>
<li><a href="cvs.log">CVS Changelog</a>
<li><a href="lartc.db">DocBook SGML</A>
<li><a href="lartc.txt">ASCII</A>, .txt
<li><a href="howto/">HTML</A>, <a
href="lartc.html">One-big-page
HTML</A>, <a href="html.tar.gz">HTML tarfile</A>
<li><a href="lartc.ps">ps</A>, <a href="lartc.ps.gz">ps.gz</A>
<li><a href="lartc.pdf">pdf</A>, <a
href="lartc.pdf.gz">pdf.gz</A>
</ul>
<a name="jobs"></a>
<H2>Jobs list</H2>
Like the Linux kernel, we have a jobs list. If you have any expertise
in any of these areas, please pitch in.
<ul>
<li>remove incorrect or dead content
<li>There are a *lot* of FIXME notices, so this means YOU!</li>
<li>IPsec</li>
<li>Multipath routing
</ul>
<a name="bazaar"></a>
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
U 2.4routing/lartc.db
...
</pre>

If you made changes and want to contribute them, run 'cvs -z3 diff -uBb',
and mail the output to <a href=mailto:howto@ds9a.nl>howto@ds9a.nl</a>, we
can then integrate it easily. Thanks! Please make sure that you edit the
.db file, by the way, the other files are generated from that one. 

The idea is that this HOWTO will be a cooperative effort, much like the
Linux kernel itself. 
<p>
<a name="sponsor"></a>
<H2>Sponsor</h2>
<a href=http://www.powerdns.com>
This site made possible by PowerDNS, for all your domain needs and
nameserver software.
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