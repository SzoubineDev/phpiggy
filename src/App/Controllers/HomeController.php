<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Paths;
use App\Services\TransactionService;
use Framework\TemplateEngine;

class HomeController
{
    public function __construct(
        private TemplateEngine $view,
        private TransactionService $transaction_service
    ) {}

    public function home()
    {
        $transactions = $this->transaction_service->getUserTransactions();
        echo $this->view->render("index.php", ['transactions' => $transactions]);
    }
}
