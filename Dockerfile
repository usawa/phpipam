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
        mariadb \
	&& dnf clean all

RUN chmod -R g+rwx /var/log && \
    chmod -R g+rwx /var/lib/php && \
    chmod -R g+rwx /run

RUN sed -i "s/.clear_env.=.*/clear_env = no/g" /etc/php-fpm.d/www.conf

USER 1001

ADD . . 

CMD /usr/libexec/s2i/run
