FROM php:8.1-apache-buster

RUN apt-get update && apt-get install -y \
    git \
    libc6-dev \
    libsasl2-dev \
    libsasl2-modules \
    libssl-dev \
    zip \
    unzip \
    net-tools

RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer

RUN git clone https://github.com/edenhill/librdkafka.git \
    && cd librdkafka \
    && ./configure \
    && make \
    && make install \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka

WORKDIR /var/www/html

COPY composer.json ./
COPY composer.lock ./
RUN composer install --no-dev --no-interaction --no-autoloader --no-scripts
COPY . ./
RUN composer dump-autoload --optimize

EXPOSE 8000

RUN chmod +x Docker.sh
ENTRYPOINT ["bash", "Docker.sh"]
