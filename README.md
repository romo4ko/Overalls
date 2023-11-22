
To deploy on local there must be install:
Git
Docker
Composer

or

Git
Composer
MySQL 

If you want to deploy via Docker:

git clone https://github.com/r0m04k0/Overalls.git
cd Overalls
composer install
sail up -d --build
sail php artisan migrate

To fill database:
sail php artisan db:seed

