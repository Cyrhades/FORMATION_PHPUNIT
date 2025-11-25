<?php declare(strict_types=1);

use FastRoute\RouteCollector;


$r->addRoute('GET', '/', 'App\\Controller\\HomeController::home');

$r->addRoute('GET', '/contact', 'App\\Controller\\ContactController::form');
$r->addRoute('POST', '/contact', 'App\\Controller\\ContactController::processing');