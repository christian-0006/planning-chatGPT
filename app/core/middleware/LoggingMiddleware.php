<?php
// app/core/middleware/LoggingMiddleware.php
require_once APPROOT . '/core/MiddlewareInterface.php';

class LoggingMiddleware implements MiddlewareInterface {
    public function handle(): bool {
        $logDir = APPROOT . '/logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }

        $logFile = $logDir . '/requests.log';

        $date = date('Y-m-d H:i:s');
        $page = $_GET['page'] ?? 'home';
        $email = $_SESSION['email'] ?? 'guest';
        $lang = $_SESSION['lang'] ?? 'fr';

        $line = "[$date] Page: $page | User: $email | Lang: $lang" . PHP_EOL;

        file_put_contents($logFile, $line, FILE_APPEND);

        // Toujours continuer la requête
        return true;
    }
}
