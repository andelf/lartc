<html>
<head><title>Linux Advanced Routing &amp; Traffic Control HOWTO</title>
<LINK REL="SHORTCUT ICON" HREF="/lartc/tux16-16.ico">
</head>
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
questions!</a>)<br>
(<font color=#ff0000><a href=#mailinglist>subscribe</a> before posting!</font>)<br></small>
#lartc on <a href=http://www.openprojects.net>irc.openprojects.net</a> (<a
href=dejairc.php>archives</a>)</td><td valign=bottom align=right>

</td>
<td valign=top>Translations:
<br>
<a
href=http://www.linux-france.org/prj/inetdoc/i/net/guides/2.4routingfr/>
	[ French ]
</a>
<br><a href="http://www.gnukorea.org/2.4routing-kr/2.4routing.html">
	[ Korean ]
</a>
<br>
<a
href=http://mr0vka.eu.org/tlumaczenia/2.4routing.html>
	[ Polish ]
</a>
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
I'm running <b>dangerously</b> low on Marks &amp; Spencer Earl Grey tea and
M&amp;S closed in Europe and no other place here sells bags that can
compare. I hear that Twinings (the black boxes) are also ok. So if you are
from the UK and are feeling thankful, my office is at the Duinweg 37,
2585 AM, The Hague, The Netherlands. Thanks - bert hubert. I think you can
just shake the bags out of the foil package and ship them in a regular
envelope.
<p>
<table border=1>
<tr><td valign=top>2002-02-07</td><td>Back from holiday. Bought lartc.org, 
will bring it in service soon. New <a
href=http://mr0vka.eu.org/tlumaczenia/2.4routing.html>Polish
translation!</a></td>
<tr><td valign=top>2002-01-13</td><td>Downtime. I returned home yesterday
evening in what might be described as a 'highly entertained' state and
accidentally shut down <a href=http://outpost.powerdns.com>outpost</a>
instead of my laptop. Also, I'm on holiday from beginning this week until
early February. So expect some silence.</td>
<tr><td valign=top>2002-01-04</td><td>We now have a favicon! Stolen from <a
href=http://www.kernel.org>www.kernel.org</a>. In other news, I've been
painting the <a href=http://ds9a.nl>house</a> and I'm busy at <a
href=http://www.powerdns.com>work</a> so it has been a bit quiet. But I'm
still there, don't worry.</td>
<tr><td valign=top>2001-12-10</td><td>Added <a
href=http://ds9a.nl/lartc/HOWTO//cvs/2.4routing/output/2.4routing-15.html#ss15.8>The Wonder
Shaper</a>, which allows you to retain very low latency while doing very
fast up- and downloads. You can even do both at the same time, but then
latency suffers. Added <a href=dejairc.php>logs
for the irc channel</a> which is already seeing some traffic.</td>
<tr><td valign=top>2001-12-10</td><td>The <a
href=manpages/>manpages</a> now include a huge CBQ page. Read it and weep.</td>
<tr><td valign=top>2001-12-09</td><td>We now have an IRC channel, #lartc on
<a href=http://www.openprojects.net>irc.openprojects.net</a>. Join #lartc
to chat about Linux &amp; Routing &amp; Shaping!</td>


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
The moderator will not approve postings from non-subscribed addresses as he
is not available at all times. If you just want to post, and not receive
mail, you can indicate this on the Mailman mailinglist management page.

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
The French
 version by Laurent Foucher and Philippe Latu from the 
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
<p>
Polish translation is <a
href=http://mr0vka.eu.org/tlumaczenia/2.4routing.html>here</a>.
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