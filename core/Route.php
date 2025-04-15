<?php

namespace core;

class Route
{
    // Stores all defined routes based on HTTP method
    private static array $routes = [];

    /**
     * ✅ SRP (Single Responsibility Principle):
     * This method only registers GET routes.
     */
    public static function get(string $path, array $callback)
    {
        self::$routes['GET'][$path] = $callback;
    }

    public static function post(string $path, array $callback)
    {
        self::$routes['POST'][$path] = $callback;
    }

    /**
     * Resolves the current route based on request URI and method.
     *
     * ✅ OCP (Open/Closed Principle):
     * - This method is open to handle both closures and controller class methods.
     *
     * ✅ DIP (Dependency Inversion Principle):
     * - It doesn't depend on how the callback is structured (function or class).
     */
    public static function resolve(string $requestUri, string $method)
    {
        $callback = self::$routes[$method][$requestUri] ?? null;

        if (!$callback) {
            http_response_code(404);
            echo "404 - Not Found";
            return;
        }

        // If callback is like [ControllerClass::class, 'method']
        if (is_array($callback)) {
            $controller = new $callback[0]();   // Instantiate the controller class
            $method = $callback[1];            // Get the method name
            $controller->$method($requestUri);
        } else {
            // If callback is a closure (anonymous function)
            call_user_func($callback);
        }
    }
}
