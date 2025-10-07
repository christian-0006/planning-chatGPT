<?php
namespace Core;

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $middlewares = [];

    public function __construct() {
        $page = $_GET['page'] ?? 'home';

        // Définir la méthode à appeler selon la page
        switch ($page) {
            case 'login':
                $this->method = 'login';
                break;
            case 'changeLang':
                $this->method = 'changeLang';
                break;
            case 'logout':
                $this->method = 'logout';
                break;
            default:
                $this->method = 'index';
                break;
        }

        // Instancier le contrôleur
        $controllerClass = "Controllers\\{$this->controller}";
        $controller = new $controllerClass();

        // Charger les middlewares depuis la config
        $middlewareClasses = require __DIR__ . '/../config/middlewares.php';

        foreach ($middlewareClasses as $class) {
            $namespacedClass = "Core\\Middleware\\$class";
            if (class_exists($namespacedClass)) {
                $this->middlewares[] = new $namespacedClass();
            } else {
                throw new \Exception("Middleware $namespacedClass introuvable !");
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
