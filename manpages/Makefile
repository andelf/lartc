all: tc.txt tc.dvi tc.pdf tc.ps tc.ps.gz 

clean:
	rm *.txt *.dvi *.pdf *.ps *.ps.gz

%.txt: %.8
	man ./$< > $@

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
