<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{
    EmailRule,
    MinRule,
    RequiredRule,
    InRule
};
use Framework\Validator;

class ValidatorService
{
    private Validator $validator;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('min', new MinRule());
        $this->validator->add('in', new InRule());
    }
    public function validateRegister(array $fromData)
    {
        $this->validator->validate($fromData, [
            'email' => ['required', 'email'],
            'age' => ['required', 'min:18'],
            'country' => ['required', 'in:USA,Canada,Mexico'],
            'password' => ['required'],
            'confirmedPassword' => ['required'],
            'socialMediaURL' => ['required'],
            'tos' => ['required'],
        ]);
    }
}
