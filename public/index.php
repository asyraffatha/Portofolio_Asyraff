<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// Vercel specific configuration
if (isset($_SERVER['VERCEL'])) {
    // For Vercel environment
    $basePath = __DIR__;
} else {
    // For local environment
    $basePath = __DIR__ . '/..';
}

// Set custom paths for Vercel
$_ENV['APP_BASE_PATH'] = $basePath;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
