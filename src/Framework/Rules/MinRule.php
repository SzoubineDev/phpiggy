<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class MinRule implements RuleInterface
{
    public function validate(array $data, string $feild, array $params): bool
    {
        if (empty($params[0])) {
            throw new InvalidArgumentException("Minimum is not set");
        }

        $lenght = (int)$params[0];
        return $lenght >= $lenght;
    }
    public function getMessage(array $data, string $feild, array $params): string
    {
        return "value must be at least {$params[0]}";
    }
}
