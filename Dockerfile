FROM php:8.4-cli

# Install necessary PHP extensions
RUN apt-get update \
&& apt-get install -y zlib1g-dev mariadb-client vim libzip-dev \
&& docker-php-ext-install zip pdo_mysql

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer global require "laravel/installer"

# Set working directory
WORKDIR /var/www/example-app

# Expose the port for artisan serve
EXPOSE 8000

# Default command
CMD ["tail", "-f", "/dev/null"]
