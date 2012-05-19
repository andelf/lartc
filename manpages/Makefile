MANPAGES_FULL := ip.8 tc.8 tc-cbq.8 tc-cbq-details.8 tc-htb.8 tc-pbfifo.8 tc-pfifo_fast.8 tc-prio.8 tc-red.8 tc-sfq.8 tc-tbf.8
MANPAGES := $(MANPAGES_FULL) tc-bfifo.8 tc-pfifo.8

ALLOUTPUTS := $(MANPAGES_FULL:.8=.txt) $(MANPAGES_FULL:.8=.dvi) $(MANPAGES_FULL:.8=.pdf) $(MANPAGES_FULL:.8=.ps) $(MANPAGES_FULL:.8=.ps.gz) $(MANPAGES_FULL:.8=.html)

all: $(ALLOUTPUTS)

clean:
	rm -f $(ALLOUTPUTS)

%.txt: %.8
	groff -man -Tascii -P-u -P-b ./$< > $@

%.dvi: %.8
	man -l -Tdvi $< > $@

%.html: %.8
	groff -man -mhtml - -Thtml  < ./$< > $@


%.pdf: %.dvi
	dvipdfm $<

%.pdf.gz: %.pdf
	gzip < $<  > $@

%.ps.gz: %.ps
	gzip < $<  > $@

%.ps: %.dvi
	dvips -o $@ $<
