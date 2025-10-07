<?php
// Fichier : public/index.php
require_once '../config/config.php';
require_once '../app/core/App.php';

//langue
require_once '../app/core/Language.php';
Language::load();

// Lance l'application
$app = new App();
?>
