<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class DateFormatRule implements RuleInterface
{

    public function validate(array $data, string $feild, array $params): bool
    {

        $parsedDate = date_parse_from_format($params[0], $data[$feild]);
        return $parsedDate['error_count'] === 0 && $parsedDate['warning_count'] === 0;
    }
    public function getMessage(array $data, string $feild, array $params): string
    {
        return "Invalid date";
    }
}
