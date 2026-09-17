<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ValidatorService;
use Framework\TemplateEngine;

class TransactionController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validator_service
    ) {}

    public function createView()
    {
        echo $this->view->render("transactions/create.php");
    }
    public function create()
    {
        $this->validator_service->validateTransaction($_POST);
    }
}
