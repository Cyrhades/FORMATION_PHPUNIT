<?php declare(strict_types=1);
session_start();

define('ROOT_DIR', dirname(__DIR__));

require ROOT_DIR.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIR, '.env');
$dotenv->load();

$router = new App\Service\Router();
$router->run();

