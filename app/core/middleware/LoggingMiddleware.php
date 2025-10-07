<?php
namespace Core\Middleware;

use Core\MiddlewareInterface;

/**
 * 🔹 Middleware pour enregistrer chaque requête dans un fichier log
 */
class LoggingMiddleware implements MiddlewareInterface {
    public function handle(): bool {
        $logDir = __DIR__ . '/../../logs';

        // Créer le dossier logs si nécessaire
        if (!is_dir($logDir)) mkdir($logDir, 0755, true);

        $logFile = $logDir . '/requests.log';

        $date = date('Y-m-d H:i:s');
        $page = $_GET['page'] ?? 'home';
        $email = $_SESSION['email'] ?? 'guest';
        $lang = $_SESSION['lang'] ?? 'fr';

        $line = "[$date] Page: $page | User: $email | Lang: $lang" . PHP_EOL;

        file_put_contents($logFile, $line, FILE_APPEND);

        return true;
    }
}
