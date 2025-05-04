# SaturnDashboard
Old discontinued project for Saturn Hosting

## Quickstart

Download PHP 8.2+

Download Laragon - Full

Download composer package manager

Start laragon apache / mysql server by pressing start all

Copy .env.example and rename it to .env

Open project in console

```
npm i
composer i
php artisan migrate --seed
php artisan key:generate
php artisan serve --port=8080
```
