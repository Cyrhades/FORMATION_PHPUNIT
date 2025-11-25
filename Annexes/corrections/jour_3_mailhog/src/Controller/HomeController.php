<?php declare(strict_types=1);

namespace App\Controller;

class HomeController extends AbstractController {

    public function home() {
        $this->render('home');
    }
}