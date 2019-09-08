FROM php:7.3-fpm-alpine

RUN apk add --update --no-cache git zip npm

RUN npm install -g serverless

COPY --from=composer /usr/bin/composer /usr/bin/composer
