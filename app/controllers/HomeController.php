<?php
namespace Controllers;

class HomeController {
    public function index() {
        require __DIR__ . '/../views/home.php';
    }

    public function login() {
        // Traitement du formulaire login
        // Vérification CSRF
        if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
            die("Erreur de sécurité : CSRF token invalide.");
        }

        // Validation de l'email
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            die("Adresse email invalide.");
        }

        // Stocker l'email validé en session
        $_SESSION['email'] = $email;
        header("Location: /home");
        exit;
    }

    public function changeLang() {
        $lang = $_GET['lang'] ?? 'fr';
        $_SESSION['lang'] = $lang;

        // Vérifier si c'est une requête AJAX
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            // Charger les traductions et renvoyer en JSON
            $translations = \Core\Language::load();
            header('Content-Type: application/json');
            echo json_encode($translations);
            exit;
        }

        // Sinon redirection classique
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
