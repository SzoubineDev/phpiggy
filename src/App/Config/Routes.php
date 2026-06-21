<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\{HomeController, AboutController, LoginController, AuthController};
use Framework\App;

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [AuthController::class, 'registerView']);
    $app->get('/login', [LoginController::class, 'login']);
}
