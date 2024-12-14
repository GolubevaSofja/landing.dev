# APPLICATION SETUP INSTRUCTION

### Versions of languages, frameworks and other components in which the project is made
- php - 8.3.1
- laravel - 11.10.0
- MySQL - 8.2.0
- npm - 10.8.1
- node - 20.14.0
- Vue - 3.4.27


## Instalation
First, you need to make sure that everything you need for the project works, this can be checked through such commands:
```bat
php -v
composer -v
node -v
npm -v
```
Further, in the terminal you should open your project's directory and write all commands there `cd 'project's path'`

Then you need to install composer and vue in the project:
```bat
composer install
npm install vue@latest vue-router@4 @vitejs/plugin-vue
```


To connect the local MySQL server, phpMyAdmin was used, where the user "landing" and the database "landing" were created using the following script:
```ini
CREATE USER 'landing'@'%' IDENTIFIED WITH mysql_native_password BY 'p@assword@landing';

GRANT USAGE ON *.* TO 'landing'@'%';

CREATE DATABASE IF NOT EXISTS `landing`;

GRANT ALL PRIVILEGES ON `landing`.* TO 'landing'@'%';
```

You will need to update `.env` file, and if it's not available, take `.env.example`, remove `.example` part and make changes in it:
```bat
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landing
DB_USERNAME=landing
DB_PASSWORD=p@assword@landing
```
Please note that this section will probably be commented, so uncomment this :)

In order to create the initial version of the database, migrations must be executed:
```bat
php artisan migrate
```
And seeders as well:
```bat
php artisan migrate:fresh --seed
```

If you don't have an encryption key generated in the .env file in APP_KEY, then you should run this command:
```bat
php artisan key:generate
```

### Basically, that's all.  
To launch this wonderful project, all you need to do is execute this:
```bat
npm run dev
```
