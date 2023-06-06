<?php session_start();
	require('conexao.php');

	if (isset($_POST['user_login'])) {      
	
		$user_login = $_POST['user_login'];
		// $passwd_login = md5($_POST['passwd_login']);
        $passwd_login = $_POST['passwd_login'];
	

		try {

			$sql_valida_login = mysqli_query($conexao,"SELECT * FROM conta WHERE usuario = '".$user_login."' AND senha = '".$passwd_login."'");
		  } catch (\Throwable $th) {
			throw $th;
		  }
		
		
		if(mysqli_num_rows($sql_valida_login) > 0){
	
		$registros_login = mysqli_fetch_assoc($sql_valida_login);

			$_SESSION['usuario'] = $registros_login['usuario'];
			$_SESSION['perfil'] = $registros_login['perfil'];


			$_SESSION['url'] = $url;
			$_SESSION['url_admin'] = $url_admin;
			$_SESSION['url_cliente'] = $url_cliente;
					
			
				if($_SESSION['perfil'] == "Admin"){

					echo "<script> alert('Administrador [LOGADO]');</script>";

					echo "<script> window.location.href='$url_admin';</script>";	

				}else{

					echo "<script> alert('Cliente [LOGADO]');</script>";

					echo "<script> window.location.href='$url_cliente';</script>";

				}
			
		} else {

		echo "<script> alert('Usuário ou senha incorreta.');</script>";

		echo "<script> window.location.href='$url';</script>";
			
		}

	}

?> 