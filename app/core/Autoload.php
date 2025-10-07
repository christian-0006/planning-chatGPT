<?php
// 🔹 Autoloader PSR-4 simple
spl_autoload_register(function($className) {
    // Transformer les backslashes du namespace en slash pour correspondre au chemin fichier
    $className = str_replace('\\', '/', $className);

    // Construire le chemin complet du fichier
    $file = APPROOT . '/' . $className . '.php';

    // Vérifier si le fichier existe et le charger
    if (file_exists($file)) {
        require_once $file;
        return;
    }

    // Si le fichier n'existe pas, lancer une exception
    throw new Exception("Classe $className introuvable.");
});
