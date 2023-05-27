<?php

	require_once '../vendor/autoload.php';
	$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
	$dotenv->load();	

	$servidor = $_ENV['DB_HOST'];
	$usuario = $_ENV['DB_USER'];
	$senha = $_ENV['DB_PSW'];
	$db_name = $_ENV['DB_NAME'];
	
	try {
		$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name) or die('Banco de dados indisponível.');
	  } catch (\Throwable $th) {
		  echo "<script> alert(".$servidor.");</script>";
		  echo "<script> alert('Erro de conexão com o banco de dados!');</script>";
		  throw $th;
	  }
	
	
	date_default_timezone_set("America/Manaus");
	
	$host_ip = $_SERVER['HTTP_HOST'];
	
	$url = "http://".$host_ip."/locte/login.php";

	$url_admin = "http://".$host_ip."/locte/admin";

	$url_cliente = "http://".$host_ip."/locte/costumer/";
	
?>