<?php
declare(strict_types = 1);
namespace Framework;
class App{
    private Router $router;
    public function __construct()
    {
        $this->router = new Router();
    }
    function run(){
        echo "application is running";
    }
    public function get (string $path){
    $this->router->add('GET',$path);
    }
    }

 