# Castus Todo Test
This is a simple todo list application built in Laravel 5.6.

You will require NodeJS (npm) and Composer to get this code up and running.

Run the following in the project root  
`composer install`  
`npm install`

Create a copy of .env.example called .env, and set up the database, you don't need to use MySQL, sqlite can be used, the
database path needs to be the absolute path.

`DB_CONNECTION=sqlite`  
`DB_HOST=127.0.0.1`  
`DB_PORT=3306`  
`DB_DATABASE=C:\Projects\castus-todo\database\database.sqlite`  
`DB_USERNAME=homestead`  
`DB_PASSWORD=secret`

Generate an application key by running  
`php artisan key:generate`

Seed the database  
`php artisan migrate:install`

Start serving the application  
`php artisan serve`  
This will provide you with a URL to access the application
  
  
Sass and JS can be compiled with  
`npm run development`  
or you can set it up to watch for changes and automatically compile  
`npm run watch`


Deletion Problem: Assignment operator used instead of eqiuvalency operator  