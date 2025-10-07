<?php
namespace Controllers;

class HomeController {
    public function index() {
        require __DIR__ . '/../views/home.php';
    }

    public function login() {
        // Traitement du formulaire login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            if ($email) {
                $_SESSION['email'] = $email;
                header("Location: ?page=home");
                exit;
            }
        }
        require __DIR__ . '/../views/login.php';
    }

    public function changeLang() {
        $lang = $_GET['lang'] ?? 'fr';
        $_SESSION['lang'] = $lang;

        // 🔹 Retour à la page précédente (login ou home)
        $back = $_SERVER['HTTP_REFERER'] ?? '?page=login';
        header("Location: $back");
        exit;
    }

    // 🔹 Méthode logout
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ?page=login");
        exit;
    }
}
