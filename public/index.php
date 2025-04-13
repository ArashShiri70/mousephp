<?php

require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../core/Request.php';


use Core\Route;
use Core\Request;

$request = new Request();

/**
 * ✅ DIP (Dependency Inversion Principle):
 * Route should not create its own Request object.
 * Instead, the main file injects dependencies.
 */
Route::resolve($request->getPath(), $request->getMethod());
