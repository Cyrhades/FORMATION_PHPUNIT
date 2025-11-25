<?php declare(strict_types=1);

require dirname(__DIR__).'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__), '.env');
$dotenv->load();

$router = new App\Service\Router();
$router->run();

