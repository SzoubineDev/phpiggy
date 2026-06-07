<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];
    public function add(string $method, string $path, array $controller)
    {
        $path = $this->NormalizePath($path);
        $this->routes[] = [
            "path" => $path,
            "method" => strtoupper($method),
            "controller" => $controller
        ];
    }
    public function NormalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace("#[/]{2,}#", "/", $path);
        return $path;
    }
}
