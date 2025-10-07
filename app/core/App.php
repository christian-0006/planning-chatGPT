<?php
// Fichier : app/core/App.php
class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $middlewares = [];

    public function __construct() {
        // Si une action est passée dans l’URL (ex: ?page=login)
        $page = $_GET['page'] ?? 'home';

        if ($page === 'login') {
            $this->controller = 'HomeController';
            $this->method = 'login';
        } elseif ($page === 'changeLang') {
            $this->controller = 'HomeController';
            $this->method = 'changeLang';
        }

        // On charge le contrôleur
        require_once APPROOT . '/controllers/' . $this->controller . '.php';
        $controller = new $this->controller;

        // 🔹 Inclure les middlewares
        require_once APPROOT . '/core/middleware/LanguageMiddleware.php';
        require_once APPROOT . '/core/middleware/AuthMiddleware.php';

        // 🔹 Ajouter les middlewares ici
        $this->middlewares = [
            new LanguageMiddleware(),
            new AuthMiddleware()
        ];

        // Exécuter tous les middlewares
        foreach ($this->middlewares as $middleware) {
            if (!$middleware->handle()) {
                // Si un middleware renvoie false, on stop la requête
                return;
            }
        }

        // Appel de la méthode correspondante
        call_user_func([$controller, $this->method]);
    }
}
?>
