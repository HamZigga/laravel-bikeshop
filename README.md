## Информация
Тестовое задание

аккаунты авторизации

test@test.ru testtest

test2@test2.com test2test2

## Запуск проекта на docker

`cp .env.docker .env`

`cd /docker`

`docker-compose build`

`docker-compose up -d`

`docker exec -it bikeshop-fpm-1 sh`

`composer install`

`php artisan key:generate`

`php artisan migrate --seed`

`php artisan storage:link`

внести домен bikeshop.test в hosts 127.0.0.1 bikeshop.test

## Запуск проекта на openserver

`cp .env.openserver .env`

`composer install`

`php artisan key:generate`

`php artisan migrate --seed`

`php artisan storage:link`



