#!/bin/sh
set -e

composer dump-autoload --no-interaction --optimize

php artisan cache:clear

php artisan config:cache
php artisan route:cache

php artisan storage:link

chown -R www:www bootstrap/cache/ storage/
chmod -R 775 bootstrap/cache/ storage/

php artisan serve --host=0.0.0.0 --port=8000
