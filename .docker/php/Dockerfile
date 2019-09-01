FROM php:7.3-fpm-alpine

RUN apk add --no-cache git zip

COPY --from=composer /usr/bin/composer /usr/bin/composer
