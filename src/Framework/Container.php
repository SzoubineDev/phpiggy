<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass, ReflectionNamedType;
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
        $constructor = $reflectionclass->getConstructor();
        if (!$constructor) {
            return new $className;
        }
        $parameters = $constructor->getParameters();
        if (count($parameters) === 0) {
            return new $className;
        }
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $type = $parameter->getType();
            if (!$type) {
                throw
                new ContainerException("failed to resolve class{$className} because param {$name} is missing type hint");
            }
            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new ContainerException("can't resolve class {$className} because invalid para name ");
            }

            $dependencies[] = $this->get($type->getName());
        }
        return $reflectionclass->newInstanceArgs($dependencies);
    }
    public function get(string $id)
    {
        if (!array_key_exists($id, $this->definitions)) {
            throw new ContainerException("class {$id} does not exist in container!");
        }
        $factory = $this->definitions[$id];
        $dependency = $factory();
        return $dependency;
    }
}
