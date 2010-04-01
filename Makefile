all:
	mkdir -p templates/cache;
	chmod a+rwX templates/cache;
	mkdir -p tmp;
	chmod a+rwX tmp;
	mkdir -p www/t;
	chmod a+rwX www/t;
	cd lib && make all;

clean:
	rm -rf templates/cache;
	rm -rf www/t;
	rm -rf tmp;
	cd lib && make clean;
