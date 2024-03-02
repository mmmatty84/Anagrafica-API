FROM php:8.2-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# Copia Composer dall'immagine ufficiale di Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crea un utente non-root e cambia l'utente
RUN useradd -m symfony_user -G www-data
USER symfony_user

# Imposta la directory di lavoro
WORKDIR /var/www/html

# Copia il progetto Symfony nella directory di lavoro
COPY . /var/www/html

# Cambia i permessi per la cartella var (cache, session, log)
USER root
RUN chown -R www-data:www-data /var/www/html/var  \
    && chmod -R 775 /var/www/html/var
USER symfony_user

# Installa le dipendenze di Composer
RUN composer install --no-dev --optimize-autoloader

ENV APP_ENV=prod \
    APP_DEBUG=0

