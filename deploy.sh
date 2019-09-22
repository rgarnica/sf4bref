#!/bin/bash
composer install --no-dev -o
composer dump-env prod
php bin/console cache:warmup --env=prod
npm install -g serverless
serverless deploy --conceal
