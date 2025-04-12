<?php

require_once __DIR__ . '/../core/Route.php';

Route::get('/', function () {
    echo "Hello World! This Is Main Page 🐭";
});

Route::get('/about', function () {
    echo "About Mouse PHP 🐭";
});