<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Exceptions\SessionException;
use Framework\Contracts\MiddlewareInterface;

class SessionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new SessionException("session is currently active");
        }
        echo "hello";
        if (headers_sent()) {
            throw new SessionException("headers alredy sent ");
        }
        session_start();
        $next();
    }
}
