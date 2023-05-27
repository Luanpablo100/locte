<?php
// Obtendo as variáveis de ambiente
$dbHost = getenv('DB_HOST');
$dbUser = getenv('DB_USER');
$dbPass = getenv('DB_PSW');

// Conectando ao banco de dados
$connection = new mysqli($dbHost, $dbUser, $dbPass);

// Verificando erros na conexão
if ($connection->connect_error) {
    die("Erro na conexão com o banco de dados: " . $connection->connect_error);
}

// Executando o script SQL
$sql = file_get_contents('./locte_db_construct.sql'); // Substitua o caminho para o arquivo SQL aqui
if ($connection->multi_query($sql) === TRUE) {
    echo "Banco de dados e tabelas criados com sucesso!";
} else {
    echo "Erro na criação do banco de dados e tabelas: " . $connection->error;
}

// Fechando a conexão
$connection->close();
?>
