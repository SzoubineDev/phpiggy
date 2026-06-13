<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;

$app = new App();
$app->get('/', [HomeController::class, 'home']);
$app->get('/register', [RegisterController::class, 'register']);


return $app;
