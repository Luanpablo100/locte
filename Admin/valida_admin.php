<?php session_start();

	if (!isset($_SESSION['user_login'])) {	
	    
	    session_destroy();
	 
	    unset ($_SESSION['user_login']);
	    unset ($_SESSION['perfil']);

		echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";
		
		echo "<script> window.location.href='http://localhost/locte/login.html';</script>";

	}	

	if ($_SESSION['perfil'] <> 'Admin') {

		echo "<script> alert('ERRO: VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA!');</script>";					
		session_destroy();
	 
		// unset ($_SESSION['nome_completo_login']);
		// unset ($_SESSION['nome_login']);
		// unset ($_SESSION['tipo_login']);

		// unset ($_SESSION['url']);
		// unset ($_SESSION['url_admin']);
		// unset ($_SESSION['url_aluno']);

		echo "<script> window.location.href='http://localhost/locte/login.html';</script>";				

	} 


?>

