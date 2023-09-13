<?php

declare(strict_types=1);

namespace Service;

use Service\Exception\SessionException;

class Session
{
    /**
     * @throws SessionException
     */
    public function start()
    {
        if (PHP_SESSION_NONE === session_status()) {
            if (!headers_sent()) {
                throw new SessionException('Impossible de modifier les entêtes HTTP.');
            } else {
                session_start();
                if (!session_start()) {
                    throw new SessionException('Démarrage de la session impossible.');
                }
            }
        } elseif (PHP_SESSION_DISABLED === session_status()) {
            throw new SessionException('La session est désactivée.');
        } else {
            throw new SessionException('Démarrage impossible.');
        }
    }
}
