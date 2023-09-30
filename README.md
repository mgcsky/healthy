# Healthy
Healthy is built to provide API for healthy demo project.

## Table of Contents

- [Setting up](#setting-up)
- [The Flow](#the-flow)

## Setting up

First, change your PHP to Version 8.2^ and make sure you have mysql installed

cd to project root folder, then running 

```
composer install
```
After that we need to setup the env
```
cp .env.example .env  
php artisan key:generate
php artisan passport:install
```
This command will create .env file for env configuration and generate key for the app and laravel passport

Next step, please make sure that you setup database connection in place below

```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Then we start migrate tables to database

```
php artisan migrate
```
And the setup is done!

## The Flow

The ideal here is to group actions that required query into one place for easier debug, handling and reuse in future.

So the API should be register in route api.php as normal, the controller now only working as a dealer so it can focus on calling which function is needed. The main data query is now moving to repository and it's functions. We handle validation in app\Http\Request and standardize data response by transformer before return.
