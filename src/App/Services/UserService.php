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
            throw new ValidationException(['email' => ['This Email is Taken']]);
        }
    }
    public function create(array $formData)
    {
        $password = password_hash($formData['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $query = "INSERT INTO users (email,password,age,country,social_media_url)
                              VALUES (:email,:password,:age,:country,:url);";

        $this->db->query($query, [
            'email' => $formData['email'],
            'age' => $formData['age'],
            'password' => $password,
            'url' => $formData['socialMediaURL'],
            'country' => $formData['country']
        ]);
    }
    public function login(array $formData)
    {
        $user = $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $formData['email']
        ])->find();

        $passwordMatch = password_verify($formData['password'], $user['password'] ?? '');

        if (!$user || !$passwordMatch) {
            throw new ValidationException(['password' => ['invalid credentials! ']]);
        }
        session_regenerate_id();
        $_SESSION['user'] = $user["id"];
    }
}
