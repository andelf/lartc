<html>
<head><title>Linux Advanced Routing &amp; Traffic Control HOWTO</title></head>
<body bgcolor=#ffffff>
<table width=100%><tr><td width=80%>
<H1>Linux Advanced Routing &amp; Traffic Control</H1>
<?
if(!ereg("^\/lartc\/",$SCRIPT_NAME))
	print("<big><font color=#ff0000>You are not using the canonical URL: <a
href=http://ds9a.nl/lartc>http://ds9a.nl/lartc</a> -
not all links may work! This URL may vanish in the future.</font></big>");
?>
</td><td valign=top align=right><a href=http://www.powerdns.com><img
src=http://ds9a.nl/pub/pdns88x33c.gif></a><p></td>
<tr><td><a href="http://ds9a.nl/">bert hubert</a> (<a
href=http://www.powerdns.com>PowerDNS.COM BV</a>) <a href=mailto:bert.hubert@netherlabs.nl>&lt;bert.hubert@netherlabs.nl&gt;</a>,<br>
<a href="http://linuxpower.cx/~greg/">Greg Maxwell</a> <a
href=mailto:greg@linuxpower.cx>&lt;greg@linuxpower.cx&gt;</a> and <br>
<a href=http://slashme.org>Remco van Mook</a> (<a
href=http://www.virtu.nl>Virtu Secure Webservices</a>) &lt;remco@virtu.nl&gt; <br>
Martijn van Oosterhout &lt;kleptog@cupid.suninternet.com&gt; <br>
Paul B Schroeder &lt;paulsch@us.ibm.com&gt; <br>
<a href="http://jsp.ds9a.nl/">Jasper Spaans</a> &lt;jasper@spaans.ds9a.nl&gt; <br>
<a href="mailto:HOWTO@ds9a.nl">HOWTO@ds9a.nl</a> <small>(HOWTO related only, do
<strong>not</strong> send questions)</small> <br>
<a href="#mailinglist">lartc@mailman.ds9a.nl</a>
(<small>mailing list</a>/<a
href=http://mailman.ds9a.nl/pipermail/lartc/>archive</a>, the <strong>only</strong> place to send
questions!</a></small>)<br>
#lartc on <a href=http://www.openprojects.net>irc.openprojects.net</a></td><td valign=bottom align=right>

</td>
</table>
<center>
<table border=1>
<tr>
<td><a href="#news">News</a> </td>
<td><a href="#mailinglist">Mailinglist</a> </td>
<td><strong><a href="#download">Download</a></strong></td>
<td><a href=manpages/>Manpages</a></td>
<td><strong><a href=HOWTO//cvs/2.4routing/output/2.4routing.html><font color=#ff0000>Dive
in!</font></a></strong>
<td><a href="#jobs">Jobs</a> </td>
<td><a href="#bazaar">Bazaar</a></td>
<td><a href="#sponsor">Sponsor</a>
</td></tr>
</table>
Massive thanks to:<br>
<small>
<?
readfile("HOWTO/cvs/2.4routing/contriblist");
?>
</small></center>
<p>

Linux has very advanced Routing, filtering and traffic shaping options.
This site attempts to document how to configure and use these features.

<a name="news"></a>
<h2>News</H2>
<table border=1>
<tr><td valign=top>2001-12-09</td><td>We now have an IRC channel, #lartc on
<a href=http://www.openprojects.net>irc.openprojects.net</a>. Join #lartc
to chat about Linux &amp; Routing &amp; Shaping!</td>
<tr><td valign=top>2001-12-08</td><td>Started work on the <a
href=manpages/>manpages</a> for tc and everything related to it. Some
interesting material is already there. If you can help, please do, it is
very hard work.</td>
<tr><td valign=top>2001-12-06</td><td>Finished documenting policing filters,
added short piece on Generic Random Early Detection queueing.

This is a major release and as such some things are changing. We are no
longer the '2.4 HOWTO', the canonical name now is 'Linux Advanced Routing
&amp; Shaping HOWTO', the canonical URL is <a
href=http://ds9a.nl/lartc>http://ds9a.nl/lartc</a>. Bumped the version
number to 0.9.0. Now is the time to help us spot mistakes, I'm going to push
the HOWTO to the LDP somewhere next week, I want it to be perfect then. Oh,
and we re-licensed under the Open Publication License, which increases
your freedom as a user.
<tr><td valign=top>2001-12-03</td><td>All other queueing disciplines are now
documented as well. Furthermore, '<a
href=http://ds9a.nl/lartc/HOWTO//cvs/2.4routing/output/2.4routing-12.html>hashed filtered
queueing</a>' (last section) is also
explained. Some chapters were shuffled, this chapter is mostly new:
<a
href=http://ds9a.nl/lartc/HOWTO/cvs/2.4routing/output/2.4routing-14.html>14.
Advanced & less common queueing disciplines</a>. Chapter 9 was improved a
lot too. Only policing filters are next!
</td>
<tr><td valign=top>2001-12-01</td><td>CBQ is now nearly completely
documented. And how shaping works in general as well. Big reorganization.
Read all about it <a
href=http://ds9a.nl/lartc/HOWTO//cvs/2.4routing/output/2.4routing-9.html>here</a>!
</td>
<tr><td valign=top>2001-11-28</td><td>Lecture was given to a pretty full
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
<tr><td>2000/2001</td><td><a href=oldnews.html>Older news</a></td>
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
<H2>Linux Advanced Routing &amp; Traffic Control HOWTO</H2>
<p>
Current version is 0.9.0 Files were last updated at 
<?
	if(!($st=stat("HOWTO/cvs/2.4routing/2.4routing.sgml")))
		$st=stat("2.4routing.sgml");
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
<li><a href="HOWTO/cvs/2.4routing/cvs.log">CVS Changelog</a>
<li><a href="HOWTO/cvs/2.4routing/2.4routing.sgml">SGML</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.txt">ASCII</A>, .txt
<li><a href="HOWTO//cvs/2.4routing/output/2.4routing.html">HTML</A>, <a href="HOWTO//cvs/2.4routing/2.4routing-howto.html">One-big-page
HTML</A>, <a href="HOWTO//cvs/2.4routing/2.4routing.tar.gz">HTML tarfile</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.dvi">dvi</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.ps">ps</A>, <a href="HOWTO//cvs/2.4routing/2.4routing.ps.gz">ps.gz</A>
<li><a href="HOWTO//cvs/2.4routing/2.4routing.pdf">pdf</A>, <a href="HOWTO//cvs/2.4routing/2.4routing.pdf.gz">pdf.gz</A>
</ul>
<a name="jobs"></a>
<H2>Jobs list</H2>
Like the Linux kernel, we have a jobs list. If you have any expertise
in any of these areas, please pitch in.
<ul>
<li>Write terminology chapter based on
<a
href=http://www.ietf.org/internet-drafts/draft-ietf-diffserv-model-06.txt>
IETF draft</a>
<li>Modify HOWTO to use this wording (mostly)
<li>Asciify Jamals <a
href=http://www.davin.ottawa.on.ca/ols/img9.htm>diagram</a>

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
U 2.4routing/2.4routing.sgml
...
</pre>

If you made changes and want to contribute them, run 'cvs -z3 diff -uBb',
and mail the output to <a href=mailto:howto@ds9a.nl>howto@ds9a.nl</a>, we
can then integrate it easily. Thanks! Please make sure that you edit the
.sgml, by the way, the other files are generated from that one.

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