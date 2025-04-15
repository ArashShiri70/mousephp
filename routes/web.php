<?php

use Core\Route;
use App\Controllers\HomeController;
use App\Controllers\Auth\UserController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/register', [UserController::class, 'register']);