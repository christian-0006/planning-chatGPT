<?php
// app/core/middleware/LanguageMiddleware.php
require_once APPROOT . '/core/Language.php';
require_once APPROOT . '/core/MiddlewareInterface.php';

class LanguageMiddleware implements MiddlewareInterface {
    public function handle(): bool {
        // Charge la langue
        Language::load();

        // Toujours continuer la requête
        return true;
    }
}
