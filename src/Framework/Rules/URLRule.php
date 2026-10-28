<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use Override;

class URLRule implements RuleInterface
{
    public function validate(array $data, string $feild, array $params): bool
    {
        return (bool) filter_var($data[$feild], FILTER_VALIDATE_URL);
    }
    public function getMessage(array $data, string $feild, array $params): string
    {
        return "invalid URL";
    }
}
