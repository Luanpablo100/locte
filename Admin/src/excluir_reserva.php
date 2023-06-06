<?php

require('../../Src/conexao.php');

if (isset($_GET['id_reservation'])) {
    $tabela = "reserva";
    $coluna = $_GET['id_reservation'];
	$id_veiculo = $_GET['id_vehicle'];

	$delete_query = "DELETE FROM $tabela WHERE id = $coluna";
	$update_disponibilidade_veiculo = "UPDATE `veiculo` SET `disponivel` = '1' WHERE `veiculo`.`id` = $id_veiculo;";
} else {

}

	$delete_query = "DELETE FROM $tabela WHERE id = $coluna";
	$update_disposnibilidade_veiculo = "UPDATE `veiculo` SET `disponivel` = '1' WHERE `veiculo`.`id` = $id_veiculo;";
	
	
		if (mysqli_query($conexao,$delete_query)) {

			mysqli_query($conexao,$update_disposnibilidade_veiculo);
				mysqli_close($conexao);

				echo "<script> alert ('EXCLUSÃO REALIZADA COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin';</script>";
				
				mysqli_close($conexao);
			}
	
?>