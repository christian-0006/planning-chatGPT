<?php
require_once APPROOT . '/core/Language.php';

class HomeController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['email'] = $_POST['email'] ?? '';
            header("Location: ?page=home");
            exit;
        }

        // Charge la langue et expose $lang à la vue
        $lang = Language::load();
        require_once APPROOT . '/views/login.php';
    }

    public function index() {
        if (!isset($_SESSION['email'])) {
            header("Location: ?page=login");
            exit;
        }

        $email = $_SESSION['email'];

        // Charge la langue et expose $lang à la vue
        $lang = Language::load();
        require_once APPROOT . '/views/home.php';
    }

    public function changeLang() {
        if (isset($_GET['lang'])) {
            $_SESSION['lang'] = $_GET['lang'];
        }

        // Redirection vers la page précédente
        $previous = $_SERVER['HTTP_REFERER'] ?? '?page=home';
        header("Location: $previous");
        exit;
    }
}
