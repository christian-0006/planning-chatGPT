<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '', // garde vide si en local
    'secure' => isset($_SERVER['HTTPS']), // seulement si HTTPS
    'httponly' => true,
    'samesite' => 'Lax'
]);

// 🔹 Démarrer la session
session_start();

// --- Generate CSRF token if not already set ---
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// 🔹 Définir APPROOT
define('APPROOT', dirname(__DIR__) . '/app');

// --- Security headers ---
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: no-referrer-when-downgrade");
header("Content-Security-Policy: default-src 'self' https://flagcdn.com https://cdn.jsdelivr.net; img-src 'self' data: https://flagcdn.com;");

// 🔹 Charger l'autoloader PSR-4
require_once APPROOT . '/core/Autoload.php';

// 🔹 Instancier l'application
use Core\App;

$app = new App();
