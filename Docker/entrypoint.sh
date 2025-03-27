composer install --no-progress --no-interaction
chomd -R 777 storage bootstrap/cache
php artisan key:generate
php artisan migrate --seed --force
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan serve --port=$PORT --host=0.0.0.0


