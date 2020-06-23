FROM php:7.4.7-fpm

RUN apt-get update && apt-get install -y \
    pkg-config \
    libssl-dev \
    libmcrypt-dev \
    sqlite3 \
    libsqlite3-dev \
    openssl \
    libcurl4-openssl-dev \
    git \
    zip \
    zlib1g-dev \
    libzip-dev \
    unzip \
    mailutils \
    mc

# Install PECL extensions
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# install mysql support
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer