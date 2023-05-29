<?php 

require('conexao.php');

        $usuario = $_POST['user_register'];
		$senha = $_POST['passwd_register'];

		$insert_usuario = "INSERT INTO conta (usuario, senha) VALUES ('".$usuario."','".$senha."')";
	
		if (mysqli_query($conexao,$insert_usuario)) {

				mysqli_close($conexao);

				$_SESSION['usuario'] = $usuario;
				$_SESSION['perfil'] = "User";
				
				echo "<script> alert ('CONTA CRIADA COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_cliente';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_cliente';</script>";
				
				mysqli_close($conexao);
			}

?>