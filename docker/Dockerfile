FROM php:7.3-apache

RUN apt-get update \
  && apt-get install -y zip \
  && curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html
COPY ./docker/apache2.conf /etc/apache2/apache2.conf
COPY . ./

RUN composer install
RUN composer dump-autoload -o
