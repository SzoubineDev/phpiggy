<?php

declare(strict_types=1);

namespace Framework;

class Container
{
    private array $definitions;
    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions[] = [$newDefinitions];
        dd($this->definitions);
    }
}
