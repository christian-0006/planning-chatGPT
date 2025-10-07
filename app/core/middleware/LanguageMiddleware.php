<?php
namespace Core\Middleware;

use Core\Language;
use Core\MiddlewareInterface;

/**
 * 🔹 Middleware pour charger la langue depuis la session
 */
class LanguageMiddleware implements MiddlewareInterface {
    public function handle(): bool {
        // Charger la langue (retourne un tableau)
        Language::load();
        return true;
    }
}
