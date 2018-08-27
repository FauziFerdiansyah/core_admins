# -------------------------- Installation ---------------------------
### run in bash :
```bash
composer update 
```
### if error you must run : 
```bash
composer install
```
copy .env.example
rename to .env
### run in bash : 
```bash
php artisan key:generate
```
open file .env search and edit DB_CONNECTION with your configuration 
### run in bash : 
```bash
php artisan migrate
```
### run in bash : 
```bash
php artisan db:seed --class=UsersTableSeeder
```

