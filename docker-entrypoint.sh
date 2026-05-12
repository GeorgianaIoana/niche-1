#!/bin/bash
set -e

# Create storage directories (volume overwrites them)
mkdir -p /app/storage/framework/cache
mkdir -p /app/storage/framework/sessions
mkdir -p /app/storage/framework/views
mkdir -p /app/storage/logs
chmod -R 775 /app/storage

# Create SQLite database if it doesn't exist
touch /app/storage/database.sqlite

# Clear file-based caches (don't need database)
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Seed data if products table is empty
php artisan tinker --execute="exit(DB::table('products')->count() > 0 ? 0 : 1);" || php artisan db:seed --class=ProductionSeeder --force

# Start the server
exec php -S 0.0.0.0:3000 -t public
