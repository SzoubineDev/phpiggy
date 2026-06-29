<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;
use Framework\TemplateEngine;
use App\Config\Paths;

class ValidationExceptionMiddleware implements MiddlewareInterface
{
    public function __construct() {}
    public function process(callable $next)
    {
        try {
            $next();
        } catch (ValidationException $e) {
        }
    }
}
