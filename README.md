
Crud Laravel app for managing the receipt of workwear in the enterprise 

Deploy via Docker:

```
git clone https://github.com/r0m04k0/Overalls.git
```
```
cd Overalls
```
```
composer install
```
```
./vendor/bin/sail up -d --build
```
```
./vendor/bin/sail php artisan migrate
```
To fill database:
```
./vendor/bin/sail php artisan db:seed
```
