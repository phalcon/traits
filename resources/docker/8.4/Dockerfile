FROM composer:2.8.5 AS composer
FROM php:8.4-fpm

COPY extra.ini /usr/local/etc/php/conf.d/

# User/Group globals
ENV MY_USER="phalcon" \
	MY_GROUP="phalcon" \
	MY_UID="1000" \
	MY_GID="1000" \
	PHP_VERSION="8.1"

# User and Group
RUN set -eux && \
	groupadd -g ${MY_GID} -r ${MY_GROUP} && \
	useradd -u ${MY_UID} -m -s /bin/bash -g ${MY_GROUP} ${MY_USER}  && \
    apt update -y && \
    apt install -y \
        apt-utils \
        git \
        libzip-dev \
        nano \
        sudo \
        wget \
        zip && \
    rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/* && \
    pecl install xdebug && \
    docker-php-ext-install \
        zip && \
    docker-php-ext-enable \
        xdebug

# Composer
COPY --from=composer /usr/bin/composer /usr/local/bin/composer
# Bash script with helper aliases
COPY .bashrc /root/.bashrc

CMD ["php-fpm"]
