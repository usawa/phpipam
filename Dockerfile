FROM registry.redhat.io/rhel10/php-83:1789521227

USER 0

RUN dnf install -y \
		php-bcmath \
		php-gd \
		php-gmp \
		php-ldap \
		php-mbstring \
		php-mysqlnd \
		php-pdo \
		php-pear \
		php-zip \
	&& dnf clean all

ADD . . 


USER 1001

CMD /usr/libexec/s2i/run
