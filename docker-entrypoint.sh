#!/bin/bash
set -e

# Run migrations
php artisan migrate --force

# Start the server
exec php -S 0.0.0.0:3000 -t public
