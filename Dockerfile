FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=getcomposer
RUN docker-php-ext-install pdo_mysql mbstring

WORKDIR /app
COPY composer.json .
CMD bash -c "composer install"
COPY . .

CMD php artisan serve --host=0.0.0.0 --port 80
