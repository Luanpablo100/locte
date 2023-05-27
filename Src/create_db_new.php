<?php

require_once './vendor/autoload.php';

use Dotenv\Dotenv;

if (file_exists(dirname(__DIR__) . '/.env')) {
    $dotenv = Dotenv::createImmutable((dirname(__DIR__)));
    $dotenv->load();
}

// Obtendo as variáveis de ambiente
$dbHost = $_ENV['DB_HOST'];
$dbUser = $_ENV['DB_USER'];
$dbPass = $_ENV['DB_PSW'];
$dbName = $_ENV['DB_NAME'];

// Nome do banco de dados a ser criado
$databaseName = $dbName;

// Conectando ao servidor MySQL
$connection = new mysqli($dbHost, $dbUser, $dbPass);

// Verificando erros na conexão
if ($connection->connect_error) {
    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
}

// Criando o banco de dados
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";
if ($connection->query($sqlCreateDatabase) === TRUE) {
    echo "Banco de dados criado com sucesso!" . PHP_EOL;
} else {
    echo "Erro na criação do banco de dados: " . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

// Conectando ao banco de dados criado
$connection->select_db($databaseName);

// Diretório com os arquivos SQL
$sqlDirectory = './database/construct/';

// Função para executar as consultas SQL de um arquivo
function executeSqlFromFile($connection, $filePath)
{
    $sql = file_get_contents($filePath);
    if ($connection->multi_query($sql) === TRUE) {
        while ($connection->more_results() && $connection->next_result()) {
            // Limpa os resultados anteriores
        }
        echo "Consultas SQL do arquivo $filePath executadas com sucesso!" . PHP_EOL;
    } else {
        echo "Erro na execução das consultas SQL do arquivo $filePath: " . $connection->error . PHP_EOL;
    }
}

// Loop infinito para executar a cada 10 segundos
while (true) {
    $sqlFiles = glob($sqlDirectory . '*.sql');

    if (!empty($sqlFiles)) {
        foreach ($sqlFiles as $sqlFile) {
            executeSqlFromFile($connection, $sqlFile);
        }
    } else {
        echo "Nenhum arquivo SQL encontrado no diretório $sqlDirectory" . PHP_EOL;
    }

    sleep(10); // Aguarda 10 segundos antes de executar novamente
}

// Fechando a conexão
$connection->close();
?>
