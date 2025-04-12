<?php

require_once __DIR__ . '/Route.php';

class App
{
    protected Route $router;

    public function __construct()
    {
        $this->router = new Route();

        // Load routes
        $router = $this->router;
        require_once __DIR__ . '/../routes/web.php';
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->resolve($uri, $method);
    }
}