<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine
{
    private array $gloabalTemplateVariables = [];
    public function __construct(private string $basePath) {}
    public function render(string $template, array $data = [])
    {
        extract($data, EXTR_SKIP);
        extract($this->gloabalTemplateVariables, EXTR_SKIP);
        ob_start();
        include  $this->resolve($template);
        $ouptut = ob_get_contents();
        ob_end_clean();
        return $ouptut;
    }
    function resolve(string $path)
    {
        return "{$this->basePath}/{$path}";
    }
    public function addGlobal(string $key, string $value)
    {
        $this->gloabalTemplateVariables[$key] = $value;
    }
}
