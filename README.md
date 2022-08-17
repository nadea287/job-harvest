# Job Harvest

### Instalation
If you do not already have Composer installed, you may do so by following the instructions at getcomposer.org. On Linux and Mac OS X, you'll run the following commands:

~~~
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
~~~

### CONFIGURATION

After cloning the project, install composer using bellow command:

~~~
composer install
~~~
Make a copy of the .env.example file and create a .env file and update database configuration (with the real database configs data) on that file:

~~~
...
DB_DATABASE=laravel_demo
DB_USERNAME=demo
DB_PASSWORD=demo123456
...
~~~

Generate an app encryption key:

~~~
php artisan key:generate
~~~

You can run migrations and seeders:
~~~
php artisan migrate
~~~

~~~
php artisan db:seed
~~~

