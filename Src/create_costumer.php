<?php 

	require('conexao.php');

	$nome_cliente  = $_POST['nome_cliente'];
	$endereco_cliente  = $_POST['endereco_cliente'];
	$telefone_cliente  = $_POST['telefone_cliente'];
	$tipo_documento  = $_POST['tipo_documento'];
	$nmr_documento  = $_POST['nmr_documento'];
	$email_cliente  = $_POST['email_cliente'];
	$id_conta  = $_POST['id_conta'];

	$tmp_imagem_documento = $_FILES['imagem_documento']['tmp_name'];

	if ( $tmp_imagem_documento != "none" )
	{
		$tamanho = $_FILES['imagem_documento']['size'];
		$fp = fopen($tmp_imagem_documento, "rb");
		$conteudo = fread($fp, $tamanho);
		$conteudo = addslashes($conteudo);
		fclose($fp);
	} else {
		$conteudo = "";
	}

	$insert_cliente = "INSERT INTO cliente (nome, endereco, telefone, tipo_documento, nmr_documento, foto_documento, email, idConta) VALUES ('".$nome_cliente."','".$endereco_cliente."','".$telefone_cliente."','".$tipo_documento."','".$nmr_documento."','".$conteudo."','".$email_cliente."','".$id_conta."')";

	if (mysqli_query($conexao,$insert_cliente)) {

		mysqli_close($conexao);

		echo "<script> alert ('DADOS DO CLIENTE CADASTRADOS COM SUCESSO!');</script>";

		echo "<script> window.location.href='$url_cliente';</script>";
		
	} else {

		echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR OS DADOS DO CLIENTE.');</script>";

		echo "<script> window.location.href='$url_cliente';</script>";
		
		mysqli_close($conexao);
	}
?>