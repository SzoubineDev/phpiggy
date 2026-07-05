<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;


class InRule implements RuleInterface
{

    public function validate(array $data, string $feild, array $params): bool
    {
        return in_array($data[$feild], $params);
    }

    public function getMessage(array $data, string $feild, array $params): string
    {
        return "Invalid Selection";
    }
}
