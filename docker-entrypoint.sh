#!/bin/bash
set -e

# Create SQLite database if it doesn't exist
touch /app/database/database.sqlite

# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Run migrations with verbose output
php artisan migrate --force -v

# Start the server
exec php -S 0.0.0.0:3000 -t public
