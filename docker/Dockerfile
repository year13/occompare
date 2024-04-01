FROM ubuntu:22.04 as base

ENV DEBIAN_FRONTEND noninteractive

# Initial update and install
RUN apt-get update -y && \
    apt-get install -y

RUN apt install -y software-properties-common
RUN add-apt-repository -y ppa:ondrej/php
RUN apt update

# install required software packages
RUN apt install -y \
    git \
    gcc \
    unzip \
    zip \
    curl \
    python3-pip \
    nginx \
    wget \
    supervisor \
    postgresql-client  \
    php8.2 \
    php8.2-cli \
    php8.2-common \
    php8.2-fpm \
    php8.2-dom \
    php8.2-pgsql \
    php8.2-zip \
    php8.2-mbstring \
    php8.2-curl \
    php8.2-xml \
    php8.2-bcmath \
    php8.2-pdo \ 
    php8.2-redis \ 
    php8.2-posix \
    php8.2-xdebug \
    php-pear


RUN curl -sL https://deb.nodesource.com/setup_21.x | bash - && \
    apt-get install -y nodejs

# create build folder
RUN mkdir /build

# Install Composer
COPY docker/install-composer.sh /build/install-composer.sh
RUN chmod +x /build/install-composer.sh && . /build/install-composer.sh

# PHP ini
COPY docker/php.ini /etc/php/8.2/fpm/php.ini
COPY docker/php-fpm-www.conf /etc/php/8.2/fpm/pool.d/www.conf

WORKDIR /var/www

# Nginx
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/site.conf /etc/nginx/sites-available/default

# supervisor
COPY docker/supervisord.conf /etc/supervisord.conf

# xdebug
COPY docker/xdebug.ini /etc/php/8.2/mods-available/xdebug.ini

RUN mkdir -p /run/php/

COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]



