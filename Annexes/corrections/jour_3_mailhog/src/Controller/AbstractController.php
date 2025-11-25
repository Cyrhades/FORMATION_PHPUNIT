<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\FlashBag;

abstract class AbstractController {

    private array $query;

    private array $body;

    private FlashBag $flash;

    public function __construct() {
        $this->query = $_GET??[];
        $this->body = $_POST??[];
        $this->flash = new FlashBag();
    }

    protected function getQuery(string $name) {
        return $this->query[$name]??null;
    }

    protected function getBody(string $name) {
        return $this->body[$name]??null;
    }

    protected function getFlash() {
        return $this->flash;
    }

    protected function render(string $template, array $args = []) {
        $templateFile = dirname(__DIR__,2).'/views/'.$template.'.phtml';
        if(file_exists($templateFile)) {
            extract($args);
            $flashMessages = $this->getFlash()->getAll();
            include $templateFile;
            exit();
        } else{
            throw new \Exception("Template  Not Found"); 
        }
    }

    protected function redirect(string $url) {
        header('location:'.$url);
        exit();
    }
}