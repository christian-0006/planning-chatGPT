<?php
// Fichier : app/core/App.php
class App {
    protected $controller = 'HomeController';
    protected $method = 'index';

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

        //On charge la langue
        require_once APPROOT . '/core/Language.php';
        Language::load();
        
        // On charge le contrôleur
        require_once APPROOT . '/controllers/' . $this->controller . '.php';
        $controller = new $this->controller;

        // Appel de la méthode correspondante
        call_user_func([$controller, $this->method]);
    }
}
?>
