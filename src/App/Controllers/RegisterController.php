<?php

declare(strict_types=1);


namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class RegisterController
{
    private TemplateEngine $view;
    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }
    public function register()
    {
        echo $this->view->render("register.php", []);
    }
}
