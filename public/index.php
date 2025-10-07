<?php
// 🔹 Démarrer la session
session_start();

// 🔹 Définir APPROOT
define('APPROOT', dirname(__DIR__) . '/app');

// 🔹 Charger l'autoloader PSR-4
require_once APPROOT . '/core/Autoload.php';

// 🔹 Instancier l'application
use Core\App;

$app = new App();
