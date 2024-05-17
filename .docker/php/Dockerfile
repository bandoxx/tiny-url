FROM php:8.3-fpm

RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            libmemcached-dev \
            libz-dev \
            libgmp-dev \
            libssl-dev \
            libmcrypt-dev \
            libicu-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    docker-php-ext-install pdo_mysql gmp intl

COPY .docker/php/config/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]