<?php
class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $middlewares = [];

    public function __construct() {
        $page = $_GET['page'] ?? 'home';

        switch ($page) {
            case 'login':
                $this->method = 'login';
                break;
            case 'changeLang':
                $this->method = 'changeLang';
                break;
            default:
                $this->method = 'index';
                break;
        }

        $controller = new $this->controller;

        // 🔹 Charger la configuration des middlewares
        $middlewareClasses = require APPROOT . '/config/middlewares.php';

        foreach ($middlewareClasses as $class) {
            if (class_exists($class)) {
                $this->middlewares[] = new $class();
            } else {
                throw new Exception("Middleware $class introuvable !");
            }
        }

        // Exécuter les middlewares
        foreach ($this->middlewares as $middleware) {
            if (!$middleware->handle()) return;
        }

        // Appeler la méthode du contrôleur
        call_user_func([$controller, $this->method]);
    }
}
