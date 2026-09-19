<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class TransactionService
{
    public function __construct(private Database $db) {}

    public function create(array $formData)
    {
        $formattedDate = "{$formData['date']} 00:00:00";
        $this->db->query(
            "INSERT INTO transactions (user_id, description, amount, date)
            VALUES (:user_id,:description,:amount,:date)",
            [
                'user_id' => $_SESSION['user'],
                'description' => $formData['description'],
                'amount' => $formData['amount'],
                'date' => $formattedDate
            ]
        );
    }
    public function getUserTransactions(int $length, int $offset)
    {
        $searchedTerm = addcslashes($_GET['s'] ?? '', '%_');
        $transactions = $this->db->query(
            "SELECT *,DATE_FORMAT(date,'%Y-%m-%d') as formatted_date 
            FROM transactions WHERE user_id = :user_id AND description LIKE :description LIMIT {$length} OFFSET {$offset}",
            [
                'user_id' => $_SESSION['user'],
                'description' => "%{$searchedTerm}%"
            ]
        )->findAll();

        return $transactions;
    }
    // public function searchTransaction(array $formData)
    // {
    //     $transactions = $this->db->query("SELECT *,DATE_FORMAT(date,'%Y-%m-%d') as formatted_date 
    //     FROM transactions WHERE description LIKE :keyword", [
    //         "keyword" => $formData['s']
    //     ])->findAll();
    //     return $transactions;
    // }
}
