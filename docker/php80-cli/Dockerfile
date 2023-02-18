FROM php:8.0-cli

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN apt-get update

RUN apt-get install unzip

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
