FROM php:7.4-apache
COPY . .

RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install -j$(nproc) mysqli


EXPOSE 80
