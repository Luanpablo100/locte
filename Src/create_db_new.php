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
    echo "<p>Erro na criação do banco de dados: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

// Conectando ao banco de dados criado
$connection->select_db($databaseName);






$sqlCreateTableCliente = "CREATE TABLE IF NOT EXISTS `cliente` (
    `id` int(11) NOT NULL,
    `nome` varchar(120) NOT NULL,
    `endereco` varchar(200) NOT NULL,
    `telefone` bigint(14) NOT NULL,
    `tipo_documento` enum('CNH','CPF','RG') NOT NULL,
    `nmr_documento` bigint(11) NOT NULL,
    `email` varchar(100) NOT NULL,
    `idReserva` int(11) DEFAULT NULL,
    `idLocacao` int(11) DEFAULT NULL,
    `IdConta` int(11) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";

$sqlCreateTableConta = "CREATE TABLE IF NOT EXISTS `conta` (
    `id` int(11) NOT NULL,
    `usuario` varchar(20) NOT NULL,
    `senha` varchar(50) NOT NULL,
    `perfil` enum('Admin','User') NOT NULL DEFAULT 'User'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";

$sqlCreateTableFuncionario = "CREATE TABLE IF NOT EXISTS `funcionario` (
    `id` int(11) NOT NULL,
    `nome` varchar(120) NOT NULL,
    `cargo` varchar(50) NOT NULL,
    `email` varchar(100) DEFAULT NULL,
    `telefone` bigint(14) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";

$sqlCreateTableLocacao = "CREATE TABLE IF NOT EXISTS `locacao` (
  `id` int(11) NOT NULL,
  `km_inicial` int(11) NOT NULL,
  `km_final` int(11) DEFAULT NULL,
  `valor` float NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `data_inicio` date NOT NULL DEFAULT current_timestamp(),
  `data_termino` date DEFAULT NULL,
  `hora_inicio` time NOT NULL DEFAULT current_timestamp(),
  `hora_termino` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";

$sqlCreateTableReserva = "CREATE TABLE IF NOT EXISTS `reserva` (
    `id` int(11) NOT NULL,
    `data_inicio` date NOT NULL DEFAULT current_timestamp(),
    `hora_inicio` time NOT NULL,
    `hora_termino` time NOT NULL DEFAULT current_timestamp(),
    `data_termino` date NOT NULL,
    `idCliente` int(11) NOT NULL,
    `idVeiculo` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";

$sqlCreateTableVeiculo = "CREATE TABLE IF NOT EXISTS `veiculo` (
    `id` int(11) NOT NULL,
    `tipo` enum('Carro','Moto','Onibus','Caminhao') NOT NULL,
    `placa` varchar(7) NOT NULL,
    `marca` varchar(20) NOT NULL,
    `modelo` varchar(29) NOT NULL,
    `ano` year(4) NOT NULL,
    `cor` varchar(15) NOT NULL,
    `quilometragem` int(11) NOT NULL DEFAULT 0,
    `codigo_imagem` longblob NOT NULL,
    `valor` float NOT NULL,
    `disponivel` tinyint(1) NOT NULL DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";


$sqlForeingKeysFilePath = './Src/database/construct/7.foreing_keys.sql'; // Substitua o caminho para o arquivo SQL aqui
$sqlForeingKeysContent = file_get_contents($sqlForeingKeysFilePath);

$sqlInsertAdminUser = "INSERT INTO `conta` (`id`, `usuario`, `senha`, `perfil`) VALUES
(3, 'admin', 'admin', 'Admin');";


sleep(10);


if ($connection->query($sqlCreateTableCliente) === TRUE) {
    echo "<p>Tabela cliente criada com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na criação da tablea cliente: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(10);

if ($connection->query($sqlCreateTableConta) === TRUE) {
    echo "<p>Tabela conta criada com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na criação da tabela conta: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(10);

if ($connection->query($sqlCreateTableFuncionario) === TRUE) {
    echo "<p>Tabela funcionário criada com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na criação da tabela funcionário: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(10);

if ($connection->query($sqlCreateTableLocacao) === TRUE) {
    echo "<p>Tabela Locação criada com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na criação da tabela Locação:</p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(10);

if ($connection->query($sqlCreateTableReserva) === TRUE) {
    echo "<p>Tabela Reserva criada com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na criação da tabela reserva: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(10);

if ($connection->query($sqlCreateTableVeiculo) === TRUE) {
    echo "<p>Tabela Veiculo criada com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na criação da tabela Veiculo: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(20);


if ($connection->multi_query($sqlForeingKeysContent) === TRUE) {
    while ($connection->more_results() && $connection->next_result()) {
        // Limpa os resultados anteriores
    }
    echo "<p>Consultas SQL do arquivo ForeingKeys executadas com sucesso!</p>" . PHP_EOL;
} else {
    echo "<p>Erro na execução das consultas SQL do arquivo ForeingKeys: </p>" . $connection->error . PHP_EOL;
}

sleep(20);


if ($connection->query($sqlInsertAdminUser) === TRUE) {
    echo "Usuário admin padrão criado com sucesso!" . PHP_EOL;
} else {
    echo "<p>Erro na criação do usuário admin: </p>" . $connection->error . PHP_EOL;
    $connection->close();
    exit;
}

sleep(10);
// Fechando a conexão
$connection->close();
?>
