<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// Display all errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

// Create necessary directories in /tmp for Vercel
$directories = [
    '/tmp/storage',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/views',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Copy pre-seeded SQLite database if it doesn't exist in /tmp
if (!file_exists('/tmp/database.sqlite')) {
    $sourceDb = __DIR__ . '/../database/database.sqlite';
    if (file_exists($sourceDb)) {
        copy($sourceDb, '/tmp/database.sqlite');
    } else {
        // Fallback: create empty database (will need migrations)
        touch('/tmp/database.sqlite');
    }
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Override storage path
$app->useStoragePath('/tmp/storage');

$app->handleRequest(Request::capture());
