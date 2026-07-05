<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class MatchingRule implements RuleInterface
{

    public function validate(array $data, string $feild, array $params): bool
    {
        $feildOne = $data[$feild];
        $feildTwo = $data[$params[0]];
        return $feildOne == $feildTwo;
    }

    public function getMessage(array $data, string $feild, array $params): string
    {
        return "passwords dont match {$param[0]}";
    }
}
