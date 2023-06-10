<h1>Connex With Laravel</h1>

<p> composer global require laravel/installer</p>

<p>Create new Laravel App</p>
<!-- laravel new App Name -->

<p>php artisan serve</p>


### Create a database table

##### php artisan make:migration create_products_table
##### php artisan make:migration create_carts_table
<!-- php artisan make:controller UserController -->

### php artisan migrate

#### re-configuring for compatibility
- add this line in config object of composer.json file

- "platform-check": false

- run php artisan config:cache

- then run composer dump-autoload in terminal