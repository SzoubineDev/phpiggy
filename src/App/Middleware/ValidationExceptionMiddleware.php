<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationExceptionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        try {
            $next();
        } catch (ValidationException $e) {
            $oldFormData = $_POST;
            $excludedKeys = ['password', 'confirmedPassword'];
            $filterdData = array_diff_key($oldFormData, array_flip($excludedKeys));
            $_SESSION['errors'] = $e->errors;
            $_SESSION['oldFormData'] = $filterdData;
            $referer = $_SERVER['HTTP_REFERER'];
            rediretTo($referer);
        }
    }
}
