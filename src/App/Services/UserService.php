<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{
    public function __construct(private Database $db) {}
    public function isEmailTaken(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM users WHERE email = :email",
            [
                'email' => $email
            ]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'This Email is Taken']);
        }
    }
    public function create(array $formData)
    {
        $query = "INSERT INTO users (email,password,age,country,social_media_url)
                              VALUES (:email,:password,:age,:country,:url);";

        $this->db->query($query, [
            'email' => $formData['email'],
            'age' => $formData['age'],
            'password' => $formData['password'],
            'url' => $formData['socialMediaURL'],
            'country' => $formData['country']
        ]);
    }
}


