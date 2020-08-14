# https://hub.docker.com/_/composer
FROM php:7.4.2

# by having the below line we can use composer in our container
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/app
COPY . .
RUN apt-get update
RUN apt-get -y install zip
RUN composer install

ENTRYPOINT [ "php", "/usr/src/app/script.php"]
