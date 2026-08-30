<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class UserService
{
    public function __construct(private Database $db) {}
    public function isEmailTaked(string $email)
    {
        $this->db->query("SELECT COUNT(*) FROM users WHERE $email = :email");
    }
}
