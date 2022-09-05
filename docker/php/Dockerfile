FROM php:7.4-fpm as php

RUN apt-get update -y \
    && apt-get install -y zlib1g-dev \
    libicu-dev \
     g++ \
     libzip-dev \
     zip \
     unzip \
     ssh \
     git \
     libssl-dev \
     && apt-get clean \
     && rm -rf /var/lib/apt/lists/*

ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="10000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="192" \
    PHP_OPCACHE_MAX_WASTED_PERCENTAGE="10"

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl mysqli opcache pdo_mysql zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && pecl install apcu \
    && docker-php-ext-enable apcu


COPY ./docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN echo 'max_execution_time = 120' >> /usr/local/etc/php/conf.d/docker-php.ini;
RUN echo 'expose_php = off' >> /usr/local/etc/php/conf.d/docker-php.ini;

ARG PUID=10000
ENV PUID ${PUID}
ARG PGID=10000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

COPY --chown=www-data:www-data . /var/www

WORKDIR /var/www/app

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer