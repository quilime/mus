all: Smarty
	#

Smarty:
	curl -sOL http://www.smarty.net/distributions/Smarty-2.6.18.tar.gz
	tar -xzf Smarty-2.6.18.tar.gz
	mv Smarty-2.6.18/libs Smarty
	rm -rf Smarty-2.6.18 Smarty-2.6.18.tar.gz

clean:
	rm -rf Smarty
