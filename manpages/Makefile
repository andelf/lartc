all:    tc.txt tc.dvi tc.pdf tc.ps tc.ps.gz tc.html \
	ip.txt ip.dvi ip.pdf ip.ps ip.ps.gz  \
        tc-sfq.txt tc-sfq.dvi tc-sfq.pdf tc-sfq.ps tc-sfq.ps.gz tc-sfq.html \
        tc-tbf.txt tc-tbf.dvi tc-tbf.pdf tc-tbf.ps tc-tbf.ps.gz tc-tbf.html \
        tc-prio.txt tc-prio.dvi tc-prio.pdf tc-prio.ps tc-prio.ps.gz tc-prio.html \
        tc-red.txt tc-red.dvi tc-red.pdf tc-red.ps tc-red.ps.gz tc-red.html \
        tc-pbfifo.txt tc-pbfifo.dvi tc-pbfifo.pdf tc-pbfifo.ps tc-pbfifo.ps.gz tc-pbfifo.html \
        tc-pfifo_fast.txt tc-pfifo_fast.dvi tc-pfifo_fast.pdf tc-pfifo_fast.ps tc-pfifo_fast.ps.gz tc-pfifo_fast.html \
        tc-cbq.txt tc-cbq.dvi tc-cbq.pdf tc-cbq.ps tc-cbq.ps.gz  tc-cbq.html \
        tc-htb.txt tc-htb.dvi tc-htb.pdf tc-htb.ps tc-htb.ps.gz  tc-htb.html \
        tc-cbq-details.txt tc-cbq-details.dvi tc-cbq-details.pdf tc-cbq-details.ps tc-cbq-details.ps.gz  tc-cbq-details.html

clean:
	rm *.txt *.dvi *.pdf *.ps *.ps.gz *~

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
