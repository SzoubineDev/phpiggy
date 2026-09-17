<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Rules\{
    EmailRule,
    MinRule,
    RequiredRule,
    InRule,
    LengthMaxRule,
    URLRule,
    MatchingRule,
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
        $this->validator->add('url', new URLRule());
        $this->validator->add('match', new MatchingRule());
        $this->validator->add('lengthMax', new LengthMaxRule());
    }
    public function validateRegister(array $fromData)
    {
        $this->validator->validate($fromData, [
            'email' => ['required', 'email'],
            'age' => ['required', 'min:18'],
            'country' => ['required', 'in:USA,Canada,Mexico'],
            'password' => ['required'],
            'confirmedPassword' => ['required', 'match:password'],
            'socialMediaURL' => ['required', 'url'],
            'tos' => ['required'],
        ]);
    }
    public function validateLogin(array $formData)
    {
        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    }
    public function validateTransaction(array $formData)
    {
        $this->validator->validate($formData, [
            'description' => ['required', 'lengthMax:255'],
            'amount' => ['required'],
            'date' => ['required']
        ]);
    }
}
