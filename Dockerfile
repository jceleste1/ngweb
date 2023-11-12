FROM php:5.6-apache
#MAINTAINER porchn <pichai.chin@gmail.com>

ENV TZ=Asia/Bangkok
# Set Server timezone.
RUN echo $TZ > /etc/timezone \
    && dpkg-reconfigure -f noninteractive tzdata \
    && echo date.timezone = $TZ > /usr/local/etc/php/conf.d/docker-php-ext-timezone.ini

RUN mkdir -p /etc/apache2/ssl

# Defaul config php.ini
COPY ./negocios/ /var/www/html/
   
RUN chown -R www-data:www-data /var/www

# Create Volume
VOLUME ['/etc/apache2/sites-enabled','/var/www','/var/log/apache2']

EXPOSE 80
EXPOSE 443