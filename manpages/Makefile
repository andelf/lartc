all:    tc.txt tc.dvi tc.pdf tc.ps tc.ps.gz  \
        tc-sfq.txt tc-sfq.dvi tc-sfq.pdf tc-sfq.ps tc-sfq.ps.gz  \
        tc-tbf.txt tc-tbf.dvi tc-tbf.pdf tc-tbf.ps tc-tbf.ps.gz  

clean:
	rm *.txt *.dvi *.pdf *.ps *.ps.gz *~

%.txt: %.8
	groff -man -Tascii -P-u -P-b ./$< > $@

%.dvi: %.8
	man -l -Tdvi $< > $@

%.pdf: %.dvi
	dvipdfm $<

%.pdf.gz: %.pdf
	gzip < $<  > $@

%.ps.gz: %.ps
	gzip < $<  > $@

%.ps: %.dvi
	dvips -o $@ $<
