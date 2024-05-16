ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm

RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libwebp-dev \
            libxpm-dev \
            libmcrypt-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    apt update; \
    apt install -y netcat-traditional

RUN set -eux; \
    # Install the PHP pdo_mysql extention
    docker-php-ext-install pdo_mysql; \
    # Install the PHP pdo_pgsql extention
    docker-php-ext-install pdo_pgsql;

COPY .docker/php/config/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY .docker/php/config/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod 775 /usr/local/bin/docker-entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

CMD ["php-fpm"]