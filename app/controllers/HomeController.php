<?php
// Fichier : app/controllers/HomeController.php

class HomeController {
    public function login() {
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['email'] = $_POST['email'] ?? '';
            header("Location: ?page=home");
            exit;
        }

        // Sinon on affiche la page de login
        require_once APPROOT . '/views/login.php';
    }

    public function index() {
        // Vérifie si l'email est bien en session
        if (!isset($_SESSION['email'])) {
            header("Location: ?page=login");
            exit;
        }

        $email = $_SESSION['email'];
        require_once APPROOT . '/views/home.php';
    }
}
?>
