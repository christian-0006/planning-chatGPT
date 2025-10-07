<?php
// Fichier : config/config.php
session_start(); // Démarre la session PHP

// Configuration du projet
define('URLROOT', 'http://localhost/mon_projet_mvc/public'); // à adapter selon ton environnement
define('APPROOT', dirname(__DIR__) . '/app');
?>
