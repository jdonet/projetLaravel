FROM php:8.4-fpm
# Extensions nécessaires pour Laravel
RUN docker-php-ext-install pdo pdo_mysql
# Optionnel mais recommandé pour Laravel
RUN docker-php-ext-install bcmath opcache
#Ajout de xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
