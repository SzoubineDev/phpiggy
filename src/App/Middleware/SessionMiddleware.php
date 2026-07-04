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
        if (headers_sent($filename, $line)) {
            throw new SessionException("headers alredy sent from file : {$filename} Line : {$line} ");
        }
        session_start();
        $next();
        session_write_close();
    }
}
