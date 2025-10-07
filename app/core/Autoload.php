<?php
// app/core/Autoload.php
spl_autoload_register(function($className) {
    // Remplacer les backslashes par des slashs
    $className = str_replace('\\', '/', $className);

    $paths = [
        APPROOT . '/core/' . $className . '.php',          // Core (App.php, Language.php)
        APPROOT . '/core/middleware/' . $className . '.php', // Middlewares
        APPROOT . '/controllers/' . $className . '.php',     // Contrôleurs
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }

    throw new Exception("Classe $className introuvable.");
});
