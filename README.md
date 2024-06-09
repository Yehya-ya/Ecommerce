<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<br>

----------
# Demo
[https://ecommerce.yehya.dev/login](https://ecommerce.yehya.dev/login)

Username: Admin

password: admin

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

you need to install Maze free bootstrap 5 admin dashboard template [Mazer installation](https://zuramai.github.io/mazer/docs/index.html).
and you have to copy the `assets` file to the `public` folder in the project 

Clone the repository

    git clone https://github.com/Yehya-ya/Ecommerce.git

Switch to the repo folder

    cd Ecommerce

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file
and add database connection and queue connection configuration

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)
***Note*** :  There is needed data for the project to work, it's recommended to populate the needed data using [database seeding](#database-seeding).

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Database seeding

**Populate the database with seed needed data for the project to work which includes admin user and currencies exchange rates.**

Run the database seeder

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

or do them both by running the following command

    php artisan migrate:fresh --seed
    
## Queue & Jobs

to be added ....
