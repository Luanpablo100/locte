<?php

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;

if (file_exists(dirname(__DIR__) . '/.env')) {
    $dotenv = Dotenv::createImmutable((dirname(__DIR__)));
    $dotenv->load();
}

$servidor = $_ENV['DB_HOST'];
$usuario = $_ENV['DB_USER'];
$senha = $_ENV['DB_PSW'];
$db_name = $_ENV['DB_NAME'];

echo $servidor . " ";
echo $usuario . " ";
echo $senha . " ";
echo $db_name . " ";
?>