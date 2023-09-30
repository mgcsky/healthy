# Healthy
Healthy is built to provide API for healthy demo project.

## Table of Contents

- [Setting up](#setting-up)
- [Diagram](#diagram)
- [The Flow](#the-flow)
- [What should be done if I have more time](#what-should-be-done-if-i-have-more-time)

## Diagram

https://lucid.app/lucidchart/6d7485ff-b3d2-45a7-b8f3-9d389514d8f9/edit?viewport_loc=-1543%2C-909%2C2296%2C1128%2C0_0&invitationId=inv_08c7cd3e-445c-4196-bbce-a90f3c3ba75a

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

## What should be done if I have more time

I think about implement DTO (data transfer object) and full version of repository pattern

1. For the DTO I think about the below package
```
https://spatie.be/docs/laravel-data/v3/introduction
```
If it can be implement then the input of repository should be clean and clear and no doubt anyone can read and know which attribute is needed, so no need to go and check line by line to gather info

2. Repository pattern and can be more flexible and clear by adding interface per repository and implement it. We can also add a binding in AppServiceProvider so that we can call interface to represent it's repository in controller. By that way when we lever up the repository (like to v2) then only re-binding on AppServiceProvider is needed instead of search and replace everywhere it's used.