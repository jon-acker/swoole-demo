FROM php:7.2-fpm
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY log.ini /usr/local/etc/php/conf.d/99-log.ini
COPY swoole.ini /usr/local/etc/php/conf.d/100-swoole.ini
COPY swoole.so /usr/local/lib/php/extensions/no-debug-non-zts-20170718/

USER root

RUN mkdir -p /run/php && chown www-data:www-data /run/php

RUN mkdir -p /var/www/swoole-demo
RUN chown www-data /var/www/swoole-demo

