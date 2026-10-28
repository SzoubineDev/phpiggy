<?php

declare(strict_types=1);

namespace Framework\Rules;


use Framework\Contracts\RuleInterface;


class RequiredRule implements RuleInterface
{
    public function validate(array $data, string $feild, array $params): bool
    {
        return !empty($data[$feild]);
    }
    public function getMessage(array $data, string $feild, array $params): string
    {
        return "this feild is required";
    }
}
