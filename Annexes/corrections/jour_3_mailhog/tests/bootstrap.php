<?php declare(strict_types=1);

const TEST_ROOT_DIR = __DIR__;
require dirname(TEST_ROOT_DIR).'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(TEST_ROOT_DIR), '.env.test');
$dotenv->load();