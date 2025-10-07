<?php
// app/core/MiddlewareInterface.php
interface MiddlewareInterface {
    /**
     * Exécute le middleware
     * @return bool Retourne true si la requête peut continuer, false pour stopper
     */
    public function handle(): bool;
}
