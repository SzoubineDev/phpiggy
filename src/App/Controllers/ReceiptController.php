<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ReceiptService, TransactionService};

class ReceiptController
{
    public function __construct(
        private TemplateEngine $view,
        private TransactionService $transactionService,
        private ReceiptService $receipt_service
    ) {}

    public function uploadView(array $params)
    {
        $transaction = $this->transactionService->getUserTransaction($params['transaction']);

        if (!$transaction) {
            redirectTo("/");
        }

        echo $this->view->render("receipts/create.php");
    }

    public function upload(array $params)
    {
        $transaction = $this->transactionService->getUserTransaction($params['transaction']);

        if (!$transaction) {
            redirectTo('/');
        }
        $receiptFile = $_FILES['receipt'] ?? null;
        $this->receipt_service->validateFile($receiptFile);
        $this->receipt_service->upload($receiptFile, $transaction['id']);
        redirectTo('/');
    }
    public function delete()
    {
        dd($params);
    }
    public function download(array $params)
    {
        dd($params);
    }
}
