<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\TransactionService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class TransactionController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validator_service,
        private TransactionService $transaction_service
    ) {}

    public function createView()
    {
        echo $this->view->render("transactions/create.php");
    }
    public function create()
    {
        $this->validator_service->validateTransaction($_POST);
        $this->transaction_service->create($_POST);
        rediretTo('/');
    }
    public function editView(array $params)
    {
        $transaction = $this->transaction_service->getTransaction($params['transaction']);
        if (!$transaction) {
            rediretTo('/');
        }
        echo $this->view->render("transactions/update.php", [
            'transaction' => $transaction
        ]);
    }
    public function update(array $params)
    {
        $transaction = $this->transaction_service->getTransaction($params['transaction']);
        if (!$transaction) {
            rediretTo('/');
        }
        $this->validator_service->validateTransaction($_POST);
        $this->transaction_service->update($_POST, $transaction['id']);
        rediretTo($_SERVER['HTTP_REFERER']);
    }
    public function delete(array $params)
    {
        $transaction = $this->transaction_service->getTransaction($params['transaction']);
        if (!$transaction) {
            rediretTo('/');
        }
        $this->transaction_service->delete((int)$params['transaction']);
        rediretTo('/');
    }
}
