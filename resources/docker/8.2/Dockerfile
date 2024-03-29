FROM composer:2.5 as composer
FROM php:8.2-fpm

COPY extra.ini /usr/local/etc/php/conf.d/

# User/Group globals
ENV MY_USER="phalcon" \
	MY_GROUP="phalcon" \
	MY_UID="1000" \
	MY_GID="1000" \
	PHP_VERSION="8.0"

# User and Group
RUN set -eux && \
	groupadd -g ${MY_GID} -r ${MY_GROUP} && \
	useradd -u ${MY_UID} -m -s /bin/bash -g ${MY_GROUP} ${MY_USER}

# Update
RUN apt update -y && \
    apt install -y \
        apt-utils \
        git \
        libzip-dev \
        nano \
        sudo \
        wget \
        zip

# PECL Packages
RUN pecl install xdebug

RUN docker-php-ext-install \
        zip

# Install PHP extensions
RUN docker-php-ext-enable \
        xdebug

# Composer
COPY --from=composer /usr/bin/composer /usr/local/bin/composer
# Bash script with helper aliases
COPY .bashrc /root/.bashrc

CMD ["php-fpm"]
