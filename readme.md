# API code challenge

Use Laravel 5.8, PHP 7.2, phpunit

swagger file - swagger.yaml 

## Structure

Routes - /routes/api.php

Controllers - /app/Http/Controllers/Api/V1

Models - /app

Tests - /tests/Feature

## Instalation

.env - config 

composer install

php artisan migrate

php artisan serve

vendor/bin/phpunit --debug

## DB

.env - config 

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=oetker
DB_USERNAME=root
DB_PASSWORD=rootpass