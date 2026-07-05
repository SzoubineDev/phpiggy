<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\EmailRule;
use Framework\Validator;
use Framework\Rules\RequiredRule;

class ValidatorService
{
    private Validator $validator;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
    }
    public function validateRegister(array $fromData)
    {
        $this->validator->validate($fromData, [
            'email' => ['required', 'email'],
            'age' => ['required', 'min:18,56,12,22'],
            'password' => ['required'],
            'confirmedPassword' => ['required'],
            'socialMediaURL' => ['required'],
            'tos' => ['required'],
        ]);
    }
}
