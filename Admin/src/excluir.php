<?php

require('../../Src/conexao.php');

if (isset($_GET['id_user'])) {
    $tabela = "conta";
    $coluna = $_GET['id_user'];
} else if (isset($_GET['id_vehicle'])) {
    $tabela = "veiculo";
    $coluna = $_GET['id_vehicle'];
} else if (isset($_GET['id_location'])) {
    $tabela = "locacao";
    $coluna = $_GET['id_location'];
} else if (isset($_GET['id_reservation'])) {
    $tabela = "reserva";
    $coluna = $_GET['id_reservation'];
}


	$delete_query = "DELETE FROM $tabela WHERE id = $coluna";
	
	
		if (mysqli_query($conexao,$delete_query)) {

				mysqli_close($conexao);

				echo "<script> alert ('EXCLUSÃO REALIZADA COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin';</script>";
				
				mysqli_close($conexao);
			}
	
?>