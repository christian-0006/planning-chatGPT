<?php
namespace Core;

/**
 * 🔹 Interface pour les middlewares
 */
interface MiddlewareInterface {
    public function handle(): bool;
}
