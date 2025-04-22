<?php

namespace App\Controllers;

use Core\View;
class HomeController
{
    /**
     * ✅ SRP (Single Responsibility Principle)
     * Handles logic for the home route
     */
    public function index(): void
    {
        View::render('home');
    }
}