<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use Framework\Exceptions\ValidationException;

class Validator
{
    private array $rules = [];
    public function add(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias] = $rule;
    }
    public function validate(array $formData, array $feilds)
    {
        $errors = [];
        foreach ($feilds as $feildName => $rules) {

            foreach ($rules as $rule) {
                $formValidator = $this->rules[$rule];
                if ($formValidator->validate($formData, $feildName, [])) {
                    continue;
                }
                $errors[$feildName][] = $formValidator->getMessage($formData, $feildName, []);
            }
        }
        if (count($errors)) {
            throw new ValidationException();
        }
    }
}
