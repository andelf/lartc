all:    tc.txt tc.dvi tc.pdf tc.ps tc.ps.gz tc.html \
        tc-sfq.txt tc-sfq.dvi tc-sfq.pdf tc-sfq.ps tc-sfq.ps.gz tc-sfq.html \
        tc-tbf.txt tc-tbf.dvi tc-tbf.pdf tc-tbf.ps tc-tbf.ps.gz tc-tbf.html \
        tc-prio.txt tc-prio.dvi tc-prio.pdf tc-prio.ps tc-prio.ps.gz tc-prio.html \
        tc-red.txt tc-red.dvi tc-red.pdf tc-red.ps tc-red.ps.gz tc-red.html \
        tc-cbq.txt tc-cbq.dvi tc-cbq.pdf tc-cbq.ps tc-cbq.ps.gz  tc-cbq.html

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
