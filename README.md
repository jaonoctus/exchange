# exchange
**[WARNING: Under development]**

An Open Source Exchange, made with Laravel (PHP) and Vue (JS)

> TODO :smile:

## Dependencies
To run this in your local environment, you will need to have previously installed:
- php >= 7.1.3
- composer
- npm
- a database like sqlite, mysql or mariadb for example

## How to run locally
1. On the root of the project, run `composer install` to install dependencies from `composer.json`.

2. Create a database, run `cp .env.example .env` and change the database settings.

3. Run `php artisan key:generate`.

4. Run `php artisan migrate:fresh --seed`.

5. Run `npm install` to install the dependencies from `package.json`.

6. Run `npm dev` or `npm prod` to generate the CSS and JS.

7. Run `php artisan serve` to start the laravel server.

8. Access [http://localhost:8000](http://localhost:8000) in your browser.

9. That's all folks! :smile:
