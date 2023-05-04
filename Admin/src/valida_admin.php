<?php session_start();

	if (!isset($_SESSION['usuario'])) {	
	    
	    session_destroy();
	 
	    unset ($_SESSION['usuario']);
	    unset ($_SESSION['perfil']);

		echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";
		
		echo "<script> window.location.href='http://localhost/locte/login.html';</script>";

	}	

	if ($_SESSION['perfil'] <> 'Admin') {

		echo "<script> alert('ERRO: VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA!');</script>";					
		session_destroy();
	 
		unset ($_SESSION['usuario']);
		unset ($_SESSION['perfl']);

		unset ($_SESSION['url']);
		unset ($_SESSION['url_admin']);
		unset ($_SESSION['url_cliente']);

		echo "<script> window.location.href='http://localhost/locte/';</script>";				

	} 


?>