# $Id$ 

all: lartc.txt lartc.pdf html/index.html html.tar.gz lartc.dvi lartc.pdf.gz lartc.ps lartc.ps lartc.ps.gz lartc.html contriblist

contriblist: lartc.txt
	./makecontriblist > contriblist

clean:
	rm -rf *.dvi *.pdf *.tex *.toc *.aux *.txt *.ps *.bak *.tmp *~ *.log html *.pdf.gz *.ps.gz html.tar.gz lartc.html contriblist

%.pdf.gz: %.pdf
	gzip < $<  > $@

%.ps.gz: %.ps
	gzip < $<  > $@


html/index.html: lartc.db
	db2html -o html lartc.db

html.tar.gz: html/index.html
	tar czf html.tar.gz html/

%.txt: %.db
	docbook2txt $<

%.pdf: %.db
	docbook2pdf -p /usr/bin/openjade $<

%.ps: %.db
	docbook2ps $<

%.dvi: %.db
	docbook2dvi $<

lartc.html: lartc.db
	docbook2html lartc.db --nochunks

publish:
	rsync --copy-links --delete -avrze ssh ./html lartc.txt lartc.pdf html.tar.gz lartc.dvi lartc.pdf.gz lartc.ps lartc.ps lartc.ps.gz lartc.html ds9a.nl:./lartc/
