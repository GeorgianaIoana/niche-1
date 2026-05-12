#!/bin/bash
set -e

# Create SQLite database if it doesn't exist
touch /app/database/database.sqlite

# Clear file-based caches (don't need database)
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Start the server
exec php -S 0.0.0.0:3000 -t public
