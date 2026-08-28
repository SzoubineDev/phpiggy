<?php

declare(strict_types=1);


namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};

class AuthController
{

    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private UserService $user_service
    ) {}
    public function registerView()
    {
        echo $this->view->render("register.php");
    }
    public function register()
    {
        // dd($_POST);
        $this->validatorService->validateRegister($_POST);
    }
}
