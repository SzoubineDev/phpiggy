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
                $rulePramaters = [];
                if (str_contains($rule, ':')) {
                    [$rule, $rulePramaters] = explode(':', $rule);
                    $rulePramaters = explode(',', $rulePramaters);
                }
                $formValidator = $this->rules[$rule];
                if ($formValidator->validate($formData, $feildName, $rulePramaters)) {
                    continue;
                }

                $errors[$feildName][] = $formValidator->getMessage($formData, $feildName, $rulePramaters);
            }
        }
        if (count($errors)) {
            throw new ValidationException($errors);
        }
    }
}
