<?php
// app/core/Language.php
class Language {
    private static array $translations = [];

    /**
     * Charge le fichier de langue selon la session ou GET
     * @return array Tableau de traductions
     */
    public static function load(): array {
        // Si la langue est passée en GET, on la stocke en session
        if (isset($_GET['lang'])) {
            $_SESSION['lang'] = $_GET['lang'];
        }

        $lang = $_SESSION['lang'] ?? 'fr';

        // Chemins candidats pour les fichiers de langue
        $candidates = [
            dirname(__DIR__) . '/lang/' . $lang . '.php',          // app/lang/*.php
            dirname(__DIR__, 2) . '/languages/' . $lang . '.php', // alternative racine
        ];

        $found = false;
        foreach ($candidates as $file) {
            if (file_exists($file)) {
                self::$translations = require $file; // le fichier doit RETURN un tableau
                $found = true;
                break;
            }
        }

        if (!$found) {
            // fallback minimal si aucun fichier trouvé
            self::$translations = [
                'home_title' => $lang === 'en' ? 'Home' : 'Accueil',
                'home_welcome' => $lang === 'en' ? 'Welcome!' : 'Bienvenue !'
            ];
        }

        return self::$translations;
    }

    // Accès rapide aux traductions (optionnel)
    public static function get(string $key): string {
        return self::$translations[$key] ?? $key;
    }
}
