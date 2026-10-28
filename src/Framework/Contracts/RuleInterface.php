<?php

declare(strict_types=1);

namespace Framework\Contracts;

interface RuleInterface
{
    public function validate(array $data, string $feild, array $params): bool;
    public function getMessage(array $data, string $feild, array $params): string;
}
