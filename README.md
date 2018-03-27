# Laravel Codeuz Project
Let's create quickly a new Laravel project

## Requirements
[Laravel](https://laravel.com/docs/5.5) >= 5.5

## Installation
    composer require codeuz/project
    composer update

## Create a new project
** Warning: ** this command will overwrite the existing files 

    php artisan vendor:publish --tag=project --force
    php artisan migrate

## Create a new user

    php artisan user:create "John" "Doe" "j@doe.com" "password"
