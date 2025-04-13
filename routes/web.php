<?php

require_once __DIR__ . '/../core/Route.php';

use Core\Route;

Route::get('/', function () {
    echo "Hello World! This Is Main Page 🐭";
});