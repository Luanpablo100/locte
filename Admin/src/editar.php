<?php

require('../../Src/conexao.php');

if (isset($_POST['id_user'])) {
    $tabela = "conta";
    $id = $_POST['id_user'];
} else if (isset($_POST['id_veiculo'])) {

    $id = $_POST['id_veiculo'];
    $valor_veiculo = $_POST['valor_veiculo'];
    $cor_veiculo = $_POST['cor_veiculo'];
    $quilometragem_veiculo = $_POST['quilometragem_veiculo'];

    $delete_query = "UPDATE `veiculo` SET `quilometragem` = '$quilometragem_veiculo', `cor` = '$cor_veiculo', `valor` = '$valor_veiculo' WHERE `veiculo`.`id` = $id;";
} else if (isset($_POST['id_location'])) {
    $tabela = "locacao";
    $id = $_POST['id_location'];
} else if (isset($_POST['id_reservation'])) {
    $tabela = "reserva";
    $id = $_POST['id_reservation'];
}


	
	
	
		if (mysqli_query($conexao,$delete_query)) {

				mysqli_close($conexao);

				echo "<script> alert ('ATUALIZAÇÃO REALIZADA COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";

				echo "<script> window.location.href='$url_admin';</script>";
				
				mysqli_close($conexao);
			}
	
?>