<?php

declare(strict_types=1);


namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};
use Exception;
use Framework\Exceptions\ValidationException;

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
        $this->validatorService->validateRegister($_POST);
        $this->user_service->isEmailTaken($_POST['email']);
        $this->user_service->create($_POST);
        rediretTo('/');
    }
}
