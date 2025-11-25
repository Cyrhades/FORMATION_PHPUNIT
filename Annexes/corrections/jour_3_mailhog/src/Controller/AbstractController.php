<?php declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController {

    private array $query;

    private array $body;

    public function __construct() {
        $this->query = $_GET??[];
        $this->body = $_POST??[];
    }

    public function getQuery(string $name) {
        return $this->query[$name]??null;
    }

    public function getBody(string $name) {
        return $this->body[$name]??null;
    }


    public function render(string $template, array $args = []) {
        $templateFile = dirname(__DIR__,2).'/views/'.$template.'.phtml';
        if(file_exists($templateFile)) {
            extract($args);
            include $templateFile;
        } else{
            throw new \Exception("Template  Not Found"); 
        }
    }


    public function redirect(string $url) {
        header('location:'.$url);
        exit();
    }
}