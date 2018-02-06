FROM php:7.2.1-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev libssl-dev --no-install-recommends \
    && pecl install imagick \
    && pecl install mongodb \
    && docker-php-ext-enable imagick \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install pdo_mysql