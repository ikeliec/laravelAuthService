# Laravel Authentication Service CodeTest

This project was developed as a recruitment exercise for Patricia.

The Laravel Authentication Service is an implementation of OAuth2 server authentication for your laravel api application. APIs typically use tokens to authenticate users and do not maintain session state between requests. This service uses Laravel Passport which provides a full OAuth2 server implementation for your Laravel application.

## Setup
1. This project is build with php on the laravel framework. Ensure you have php 7+ installed and running on your machine. To confirm php is installed correctly run the following command on the terminal of your machine `php -v` to display the version of php installed.
2. Install composer for package and dependency management. run `composer -V` on your terminal to check the version of composer installed.
3. Run the following git command on the terminal to clone this repository `git clone https://github.com/ikeliec/laravelAuthService.git`
4. Run `composer install` to download application packages and dependencies.  if composer is install locally on the project run `php composer.phar install`
5. Setup your database server (MySql). Create a database and connect to the application by updating the connection settings in the `.env` file
6. Run migration to create and initialize database tables.
7. Run `php artisan serve` command to start the application. The application by default will be running on `http://127.0.0.1:8000`
8. Visit `http://127.0.0.1:8000/docs` on your favourite web browser to view Laravel Authentication Service CodeTest API documentation

## Issues
If you encounter any issue setting up this project or you ran into an exception. Do not hesitate to create an Issue in the Issue Logs, I will be most glad to assist.

Cheers :)
