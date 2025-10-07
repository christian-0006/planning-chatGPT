<?php
namespace Core\Middleware;

use Core\MiddlewareInterface;

/**
 * 🔹 Middleware pour vérifier si l'utilisateur est connecté
 */
class AuthMiddleware implements MiddlewareInterface {
    public function handle(): bool {
        $page = $_GET['page'] ?? 'home';

        // Si l'utilisateur n'est pas connecté et qu'il n'est pas sur la page login
        // 🔹 Autoriser login et changement de langue même si non connecté
        $allowedPages = ['login', 'changeLang'];
        if (!isset($_SESSION['email']) && !in_array($page, $allowedPages)) {
            header("Location: ?page=login");
            exit; // Bloquer la requête
        }

        return true; // Continuer sinon
    }
}
