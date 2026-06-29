<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class Validationmiddleware implements MiddlewareInterface
{
    public function process(callable $next) {
        try 
         $next();
    }
}
