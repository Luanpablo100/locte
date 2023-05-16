<?php //session_start();

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$db_name = "locte_db";
	
	try {
		$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name) or die('Banco de dados indisponível.');
	  } catch (\Throwable $th) {
		// throw $th;
		echo "<script> alert('Erro de conexão com o banco de dados!');</script>";
	  }
	
	
	date_default_timezone_set("America/Manaus");
	
	$host_ip = $_SERVER['HTTP_HOST'];
	
	$url = "http://".$host_ip."/locte/login.php";

	$url_admin = "http://".$host_ip."/locte/admin";

	$url_cliente = "http://".$host_ip."/locte/costumer/";
	
?>