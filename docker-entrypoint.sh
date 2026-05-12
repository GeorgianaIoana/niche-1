#!/bin/bash
set -e

# Create SQLite database if it doesn't exist
touch /app/database/database.sqlite

# Run migrations
php artisan migrate --force

# Start the server
exec php -S 0.0.0.0:3000 -t public
