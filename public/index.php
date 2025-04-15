<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';

use Core\Route;
use Core\Request;

$request = new Request();

/**
 * ✅ DIP (Dependency Inversion Principle):
 * Route should not create its own Request object.
 * Instead, the main file injects dependencies.
 */
Route::resolve($request->getPath(), $request->getMethod());
