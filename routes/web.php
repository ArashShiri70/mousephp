<?php

require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';

use core\Route;
use app\controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);