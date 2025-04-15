<?php

require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/Auth/UserController.php';

use core\Route;
use app\controllers\HomeController;
use app\controllers\auth\UserController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/register', [UserController::class, 'register']);