<html>
<head>
<title>How to do simple loadbalancing with Linux without a single point of failure</title>
</head>
<body bgcolor=#ffffff>
<p>
bert hubert &lt;<a href=mailto:ahu@ds9a.nl>ahu@ds9a.nl</a>&gt;
<p>
Welcome!

This page reflects some experiments I did that show promise in
providing loadbalancing which can be very interesting in some situations.
<p>
This is most useful for services which are CPU bound and not network bound.

<h2>The goal</h2>
Loadbalance a service on one IP address over multiple Linux servers without
generating a new single point of failure.

<h2>Why</h2>

Excellent projects like <a href=http://linux-vs.org>The Linux Virtual
Server</a> or machines like the <a href=http://www.alteonwebsystems.com>Alteon
Acedirector</a> already provide loadbalancing. However, these all entail
either an additional single point of failure, or need the loadbalancing
machine itself to be redundantly implemented (ie, two boxes).
<p>
Doing so is expensive and often not needed. It is however a very good way of
scaling to enormous bandwidths - because of the tricks these solutions
employ, they are able to do gigabits of traffic.
<p>
We want to be able to provide loadbalancing for hosts that do not saturate
their ethernet, but do need more CPU or IO horsepower than a single box can
provide.

<H2>Intended audience</h2>
Do not interpret this document as a HOWTO. Everything here is very new and
very lightly tested. Play around, let me know what happens, but don't
complain that your 1024-server deployment just does not do what I promised
it would.
<p>
Even if you are confident that you are savvy enough to fool around, only use
what we descibe here if your service is CPU or IO bound, and if you are
not saturating your network. If the latter is the case, doing loadbalancing
like this will only hurt performance!

<h2>How it normally works </h2>
<p>
We'll assume that you have four servers, 192.168.0.10 to 192.168.0.13, and
that the service you want to provide will live on the virtual IP address
192.168.0.2. We also assume that your subnet is 192.168.0.0/24
(192.168.0.0-192.168.0.255), and that your default gateway is 192.168.0.1,
which need not be a Linux machine. Furthermore, you are using a hub and not
a switch.

<br>
In ascii art:

<pre>
 [Client]
    |
[Internet] - 192.168.0.1 --[HUB]---+---------+-----+-----+
             default               |         |     |     |
             gateway               |         |     |     |
                              192.168.0.10  11    12    13
</pre>

Ok - now a customer on the internet wants to access your webserver on
192.168.0.10, and a SYN packet (which starts a TCP/IP session) arrives at
your default gateway, which then needs to access a host that feels
responsible for 192.168.0.10. 

<p>

In order to find the right host, the router sends out an Address Resolution
Protocol (ARP) 'who-has 192.168.0.10? tell 192.168.0.1'-query. Normally then
one of your servers responds with its MAC address '00:10:D7:01:20:11 has
192.168.0.10'. Your router then uses this information to route the SYN
packet to the proper MAC address, which is then accepted by your webserver
192.168.0.10.

<p>

<b>It is vital that you understand this before proceeding!</b> The MAC
address can be likened to the address of your building, '12 Router Avenue'.
The destination IP address is like the name of your company. The router is
the mailperson that stands in your street and shouts 'Where do I deliver
mail for Evil Linux Routing Tricks INC?'. Your receptionist would then shout
back 'Give it to the people over at 12 Router Avenue', which would prompt
the mailperson to deliver mail at that building.

<p>
Router -> mailperson<br>
Destination IP address -> company name<br>
MAC Address (also Hardware Address, Ethernet Address) -> house number +
street<br>
ARP query -> mailperson shouting 'Where do I deliver..'<br>
ARP response -> receptionist that replies 'Over at 12 Router Avenue'
<h2>How we subvert this for our purposes</h2>
Each IP address can have only one MAC address, the router remembers only a
single MAC address. So we need to give all our webservers the same MAC
address! Yes, this is the icky bit. Also, all webservers need to get an IP
alias so they feel resposible for the service we want to offer on
192.168.0.2.

This is achieved by executing the following on 192.168.0.10 to 13:
<pre>
# ip link set eth0 down 
# ip link set eth0 address 1:0:0:0:0:0
# ip link set eth0 up
# ip route add default via 192.168.0.1
# ip addr add dev eth0 192.168.0.2
</pre>
<p>
FIXME: There are MAC addresses reserved for stunts like these, but I haven't
yet looked them up - please let me know.
<p>

The first three commands are self explanatory. The fourth is needed to
reestablish the default route that went down together with the interface.
The last command then adds 192.168.0.2 to the list of addresses the host
feels responsible for.
<p>
If you execute this remotely, make sure you do so from a script, as you
might lose contact after 'ip link set eth0 down'! You might even wish to use
'nohup' to make sure your script survives. If you haven't yet tried the
wonderful 'ip' tool, please install iproute2 - it is far superior in
configuring the kernel than ifconfig and friends are.
<p>
The new picture:
<pre>
 [Client]
    |
[Internet] - 192.168.0.1 --[HUB]---+---------+-----+-----+
             default               |         |     |     |
             gateway               |         |     |     |
                              192.168.0.10  11    12    13
additional:                   192.168.0.2    2     2     2
all have same MAC address
</pre>

What then happens is that the SYN packet for 192.168.0.2 comes along, the
router does an ARP query to get the MAC address, and gets 4 identical
responses. This in itself is not a problem - it would be neater if only one
machine responded, but hey.
<p>

Now comes the problem. The SYN packet gets transmitted over the network, and
again all four machines respond with a SYN|ACK! The router doesn't care
about this, it is an IP device and has no clue what a SYN|ACK packet is. So
it sends all four packets back to the client that initiated the connection.

<p>
But the client now does get confused and swiftly drops the connection. Four
almost, but not quite, identical SYN|ACK packets is too much to deal with for a
simple client.
<p>
The solution is simple: for each SYN packet, only one host should respond.
Now the problem is how to achieve that.

<h2>Making sure only one host gets the connection</h2>
First concentrate on the SYN packet, then we'll deal with the rest later. The
solution is pretty obvious - all machines need to be able to calculate if
they want to deal with a connection or not. To do this, we look at the IP
address of the client and do some bitfidling on it.
<p>
First let's do this for two hosts. We want all even IP addresses to go to
192.168.0.10, all odd ones to 192.168.0.11. We do do with the following
iptables commands:
<pre>
[192.168.0.10]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.0/0.0.0.1 -j DROP
[192.168.0.11]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.1/0.0.0.1 -j DROP
[192.168.0.12]# iptables -A INPUT -d 192.168.0.2 -j DROP
[192.168.0.13]# iptables -A INPUT -d 192.168.0.2 -j DROP
</pre>
The ip addresses between brackets denote on which hosts the commands need to
be executed. We expressed the 'even/odd' constraint by using the rather
unconventional 0.0.0.1 netmask, '-1' in /-notation.
<p>
Basically we say 'drop all traffic to 192.168.0.2 unless the source ip
address is even' (or odd, in case of 192.168.0.11). More explicitly, 'drop
all traffic to 192.168.0.2 if the last bit is/is not 0'.
<p>
Well, we're nearly there :-) If you now connect from the outside world to
192.168.0.2, depending on the even/oddness of your source IP address, you'll
get connected to either 192.168.0.10 or to 192.168.0.11!
<H2>Scaling to four or more hosts</h2>
Two is not that interesting because we can, by definition, not deal with the
failure of one box, because we started loadbalancing because we needed more
horsepower than one machine can deliver. 
<br>
To include all four hosts, we need to look at the last 2 bits of the source
IP address. These last two bits have values 1+2=3:
<pre>
[192.168.0.10]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.0/0.0.0.3 -j DROP
[192.168.0.11]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.1/0.0.0.3 -j DROP
[192.168.0.12]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.2/0.0.0.3 -j DROP
[192.168.0.13]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.3/0.0.0.3 -j DROP
</pre>
This reads like 'drop all traffic to 192.168.0.2 *unless* the last 2 bits of
the IP address are {00,01,10,11}'.

If you have 8 hosts this starts to look something like this:
<pre>
[192.168.0.10]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.0/0.0.0.7 -j DROP
[192.168.0.11]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.1/0.0.0.7 -j DROP
[192.168.0.12]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.2/0.0.0.7 -j DROP
(...)
[192.168.0.17]# iptables -A INPUT -d 192.168.0.2 \! -s 0.0.0.7/0.0.0.7 -j DROP
</pre>
If your number of servers is not a power of 2, things get lots more
interesting! See also the 'Where to go from here' chapter.
<h2>Tuning</h2>
There are some problems with the setup so far. Most notable:
<ul>
<li>ICMP traffic that is related to TCP/IP sessions may get delivered to the
wrong server as it may have a different source IP address (any router on
your path can send ICMP messages!)</li>
<li>If you connect to 192.168.0.10,11,12,13, the other machines with the
same MAC address respond with ICMP redirects 'don't send this to me'.</li>
<li>Unless you switch off ip forwarding on the hosts, they will even forward
the packet right back for you!
</ul>
Luckily, all these problems can be resolved by expanding our iptables rules
a bit, and tweaking some files in /proc.

A suggested (and partly untested) set would be:
<ol>
<li># echo 0 > /proc/sys/net/ipv4/conf/eth0/send_redirects</li>
<li># echo 0 > /proc/sys/net/ipv4/ip_forward</li>

<li># iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT </li>
<li># iptables -A INPUT -m state --state NEW -p tcp -d 192.168.0.2 -s 0.0.0.X/0.0.0.3 -j ACCEPT</li>
<li># iptables -A INPUT -p udp -d 192.168.0.2 -s 0.0.0.X/0.0.0.3 -j ACCEPT</li>
<li># iptables -A INPUT -p icmp -d 192.168.0.2 -j DROP</li>
<li># iptables -A INPUT -d 192.168.0.1X -j ACCEPT </li>
<li># iptables -A INPUT -j DROP</li>
</ol>
Where X goes from 0 to 3 for the different hosts.
<p>
This prevents the servers from routing stuff back to the network and enables
them to receive TCP and UDP traffic meant for them. All machines receive
ICMP traffic for the virtual IP address, but iptables stateful filtering
make sure that the kernel stack only sees relevant ICMP messages.
<p>
We also make sure that traffic to the non-virtual IP address *is* accepted
properly. The line by line summary:

<OL>
<li>Stop the server from sending out redirects for traffic it doesn't want</li>
<li>Stop the server from forwarding back traffic it doesn't want</li>
<li>Accept already running TCP/IP sessions - this is great for when you
change which new connections (even, odd, whatever) you want to accept,
without hurting existing ones.</li>
<li>Allow new incoming TCP sessions from selected IP addresses</li>
<li>Allow incoming UDP packets from selected IP addresses</li>
<li>Kill any remaining icmp traffic for the virtual IP - either it already got accepted by the
first iptables line ('RELATED'), or it is not for us</li>
<li>Accept traffic for our real IP address</li>
<li>Drop the rest</li>
</OL>

If you want your machine to ping back, add this after line 5:

<pre>
# iptables -A INPUT -p icmp --icmp-type echo-request -j ACCEPT -d 192.168.0.2 -j ACCEPT
</pre>

<H2>Where to go from here</h2>
Besides loadbalancing, you may need redundancy. In order to do so, we need
tools that keep the iptables rules in sync over multiple hosts. This hasn't
been written yet, but it could be.
<p>
Such a tool would also calculate and insert the right iptables rules
automatically.
<H2>And if I have a switch?</H2>
Two possible solutions - either configure your switch to act as a hub, or
employ additional tricks to confuse the switch so it acts as a hub. The
later option entails sending from a different MAC address than the one we
listen on. Doing so is, as far as I know, not possible with off the shelf
Linux tools. I doubt if it should be.
<p>

Solutions might be to get netfilter in a position where it can change source
MAC addresses on outgoing packets. This should also happen on ARP queries
and replies. As far as I know this is a hot item currently.
<p>
Another solution would be to teach linux that a card can have two addresses, a
'listen address' and a 'send address'.
<p>
I will be discussing this with the relevant people. If you feel that you are
one of those people, please contact <a href=mailto:ahu@ds9a.nl>me</a>.

<H2>I think you should be locked up!</H2>
I admit that having multiple hosts with identical MAC addresses is pretty
evil. I also know that there are cleaner solutions. But these all need
additional hardware and create new points of failure. I'm not advocating the
use of this trick for all services, but it would work *very* well for
nameservers. And <a href=http://www.powerdns.com>nameserving</a> is my trade.

<H2>Doesn't Microsoft do something like this with W2K?</H2>
People tell me so - I have never worked with Windows, so I wouldn't know.
<p>
<small><center>$Id$</center></small>
</html>
