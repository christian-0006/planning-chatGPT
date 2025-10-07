<?php
session_start();

// Définir APPROOT
define('APPROOT', dirname(__DIR__) . '/app');

// Charger l’autoloader
require_once APPROOT . '/core/Autoload.php';

// Instancier l’application
$app = new App();
