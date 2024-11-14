# Utilisez la dernière version de PHP 8 avec Alpine Linux pour une image plus légère
FROM php:8.3.13-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
# RUN docker-php-ext-install mysqli 
EXPOSE 80

# Copiez votre code source dans le répertoire web
COPY . /var/www/html