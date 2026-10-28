<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Paths;
use App\Services\TransactionService;
use Framework\TemplateEngine;

class HomeController
{
    public function __construct(private TemplateEngine $view, private TransactionService $transaction_service) {}

    public function home()
    {
        $page  = (int)($_GET['p'] ?? 1);
        $length = 3;
        $offset = ($page - 1) * $length;
        $searchTerm = $_GET['s'] ?? null;
        [$transactions, $count] = $this->transaction_service->getUserTransactions($length, $offset);
        $lastPage = ceil($count / $length);
        
        $pages = $lastPage ? range(1, $lastPage) : [];
        $currentPageQuery = array_map(fn($pageNum) => http_build_query([
            'p' => $pageNum,
            's' => $searchTerm
        ]), $pages);

        echo $this->view->render("index.php", [
            'transactions' => $transactions,
            'currentPage' => $page,
            'previousPageQuery' => http_build_query([
                's' => $searchTerm,
                'p' => $page - 1
            ]),
            'lastPage' => $lastPage,
            'nextPageQuery' => http_build_query([
                's' => $searchTerm,
                'p' => $page + 1
            ]),
            'searchTerm' => $searchTerm,
            'currentPageQuery' => $currentPageQuery

        ]);
    }
}
