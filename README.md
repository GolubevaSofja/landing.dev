# APPLICATION SETUP INSTRUCTION

### Versions of languages, frameworks and other components in which the project is made
- php - 8.3.1
- laravel - 11.10.0
- MySQL - 8.2.0
- Statamic/cms - 5.7.2

- npm - 10.8.1
- node - 20.14.0
- Vue - 3.4.27


## Instalation
To connect the local MySQL server, phpMyAdmin was used, where the user "landing" and the database "landing" were created using the following script:
```ini
CREATE USER 'landing'@'%' IDENTIFIED WITH mysql_native_password BY 'p@assword@landing';

GRANT USAGE ON *.* TO 'landing'@'%';

CREATE DATABASE IF NOT EXISTS `landing`;

GRANT ALL PRIVILEGES ON `landing`.* TO 'landing'@'%';
```

In order to create the initial version of the database, migrations must be executed:
`php artisan migrate`



## Install Statamic

There are 3 steps to follow to install Statamic into your Laravel app.

Run `php artisan config:clear` to make sure your config isn't cached.

Add the `statamic:install` command to post-autoload-dump in composer.json.

```php
"scripts": {
    "post-autoload-dump": [
        "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
        "@php artisan package:discover --ansi",
        "@php artisan statamic:install --ansi",
        "@php artisan statamic:search:update --all --ansi",
        "@php artisan statamic:static:clear --ansi"
],
}
```

Install statamic/cms with Composer:
```bat
composer require statamic/cms --with-dependencies
```


### Creating Users

The easiest way to create your first user is by running `php please make:user` terminal command. After entering basic information, setting a password, and saying yes to super user, you can log into the control panel at example.com/cp.



## All terminal commands:
`cd "your derictory"`

`composer create-project laravel/laravel .`

MySQL scripts:
``` ini
CREATE USER 'lab3'@'%' IDENTIFIED WITH mysql_native_password BY 'p@assword@lab3';

GRANT USAGE ON *.* TO 'lab3'@'%';

CREATE DATABASE IF NOT EXISTS `lab3`;

GRANT ALL PRIVILEGES ON `lab3`.* TO 'lab3'@'%';
```

Update the `.env` file in the root of your Laravel installation folder. Locate configuration section that starts with keys `DB_CONNECTION`, and set the following keys:
```bat
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landing
DB_USERNAME=landing
DB_PASSWORD=p@assword@landing
```
```bat
php artisan make:model Country --migration
php artisan make:model BlockType --migration
php artisan make:model Block --migration
...
```
```bat
php artisan migrate
```

Vue scripts:
```bat
npm install
npm install vue@latest vue-router@4 @vitejs/plugin-vue
```
