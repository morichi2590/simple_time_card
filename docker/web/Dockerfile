FROM php:8.0-apache

COPY 000-default.conf /etc/apache2/sites-enabled/
COPY php.ini /usr/local/etc/php/
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
  && apt-get install -y git zip unzip vim \
  && docker-php-ext-install bcmath pdo_mysql

COPY --from=node:16.13 /usr/local/bin /usr/local/bin
COPY --from=node:16.13 /usr/local/lib /usr/local/lib

RUN a2enmod rewrite

WORKDIR /var/www/html