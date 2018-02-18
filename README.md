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
1. On the root of the project, install laravel dependencies with ```composer install```

2. Create a database, make a copy of the file .env-example with name .env and change the database settings to match with your new database

3. run ```php artisan key:generate```

4. run ```php artisan migrate:fresh --seed```

5. Install the dependencies from package.json with ```npm install```

6. Run the laravel server with ```php artisan serve```

7. Access http://localhost:8000 in your browser

8. That's all folks :)
