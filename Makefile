# $Id$ 

all: dummy 2.4routing.txt 2.4routing.dvi 2.4routing.ps 2.4routing.ps.gz 2.4routing.pdf 2.4routing.pdf.gz output/2.4routing.html 2.4routing-howto.html 2.4routing.tar.gz 

dummy:
	cvs update
	cvs log > cvs.log


clean:
	rm -f *~ 2.4routing.{txt,dvi,ps,ps.gz,pdf,pdf.gz,tex,tar.gz} output/2.4routing*html 

%.txt: %.sgml
	sgml2txt -f $<

%.tex: %.sgml
	sgml2latex -o tex $<
	grep -v "{t1enc}" $@ > $@.tmp
	mv $@.tmp $@

%.dvi: %.tex
	latex $<
	latex $<

%.pdf: %.dvi
	dvipdfm $<

%.pdf.gz: %.pdf
	gzip < $<  > $@

%.ps.gz: %.ps
	gzip < $<  > $@

%.ps: %.dvi
	dvips -o $@ $<

2.4routing-howto.html: 2.4routing.sgml
	sgml2html -s 0 2.4routing.sgml 
	mv 2.4routing.html 2.4routing-howto.html



output/2.4routing.html: 2.4routing.sgml
	-mkdir output
	(cd output;sgml2html ../2.4routing.sgml)

2.4routing.tar.gz: output/2.4routing.html
	tar cvzf 2.4routing.tar.gz output/2.4routing*html