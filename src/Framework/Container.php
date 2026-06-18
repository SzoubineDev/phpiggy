<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass;
use Framework\Exceptions\ContainerException;

class Container
{
    private array $definitions = [];
    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions];
    }
    public function resolve(string $className)
    {
        $reflectionclass = new ReflectionClass($className);
        if (!$reflectionclass->isInstantiable()) {
            throw new ContainerException("{$className}isn't instantiable!");
        }
        dd($reflectionclass);
    }
}
