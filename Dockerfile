FROM php:8.2.1-fpm-alpine

ARG TZ='UTC'
ARG USER
ARG UID

RUN echo "${TZ}" && apk --update add tzdata && \
    cp /usr/share/zoneinfo/$TZ /etc/localtime && \
    echo $TZ > /etc/timezone && \
    apk del tzdata

RUN apk add --no-cache bash shadow nano mysql-client

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
RUN /usr/bin/composer self-update

RUN useradd -G www-data -u $UID -d /home/$USER $USER
RUN mkdir -p /home/$USER/.composer && \
    chown -R $USER:$USER /home/$USER

USER $USER

WORKDIR /var/www/

