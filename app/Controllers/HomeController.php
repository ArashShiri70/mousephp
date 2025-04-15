<?php

namespace app\controllers;

class HomeController
{
    /**
     * ✅ SRP (Single Responsibility Principle)
     * Handles logic for the home route
     */
    public function index(): void
    {
        echo "Hello from HomeController 🐭";
    }
}