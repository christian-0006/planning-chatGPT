<?php
namespace Core;

/**
 * 🔹 Classe pour gérer les langues
 */
class Language {
    public static function load(): array {
        // Déterminer la langue choisie en session, par défaut français
        $lang = $_SESSION['lang'] ?? 'fr';

        // Tableau des traductions
        $translations = [
            'fr' => [
                'hello' => 'Bonjour',
                'email_received' => "J'ai reçu votre email :",
                'login_email' => 'Entrez votre email',
                'login_submit' => 'Connexion'
            ],
            'en' => [
                'hello' => 'Hello',
                'email_received' => 'I have received your email:',
                'login_email' => 'Enter your email',
                'login_submit' => 'Login'
            ]
        ];

        // Retourner les traductions de la langue courante
        return $translations[$lang] ?? $translations['fr'];
    }
}
