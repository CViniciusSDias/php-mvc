FROM php:8.0-cli

RUN pecl install swoole
RUN docker-php-ext-enable swoole
