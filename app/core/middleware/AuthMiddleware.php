<?php
// app/core/middleware/AuthMiddleware.php
require_once APPROOT . '/core/MiddlewareInterface.php';

class AuthMiddleware implements MiddlewareInterface {
    public function handle(): bool {
        // Si l’utilisateur n’est pas connecté et n’est pas sur login, on stop et redirige
        $page = $_GET['page'] ?? 'home';
        if (!isset($_SESSION['email']) && $page !== 'login') {
            header("Location: ?page=login");
            exit;
        }
        return true;
    }
}
