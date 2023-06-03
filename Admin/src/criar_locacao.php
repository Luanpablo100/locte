<?php 

require('../../Src/conexao.php');


	$id_cliente = $_POST['select_cliente'];
	$id_veiculo = $_POST['modelo_veiculo'];
	$km_inicial = $_POST['km_veiculo'];
	$data_inicio = $_POST['data_inicio'];
	$data_termino = $_POST['data_entrega'];
	$hora_inicio = $_POST['hora_inicio'];
	$hora_termino = $_POST['hora_entrega'];
	$valor = $_POST['valor_locacao'];
	$pagamento = $_POST['pagamento'];

	$hora_inicio = $hora_inicio . ":00";
	$hora_termino = $hora_termino . ":00";

	if (strpos($valor, ',') !== false) {
    // Substituir a vírgula por ponto
    $valor = str_replace(',', '.', $valor);
}

	$insert_locacao = "INSERT INTO locacao (km_inicial, valor, pagamento, idCliente, idVeiculo, data_inicio, data_termino, hora_inicio, hora_termino) VALUES ('".$km_inicial."','".$valor."','".$pagamento."','".$id_cliente."','".$id_veiculo."','".$data_inicio."','".$data_termino."','".$hora_inicio."','".$hora_termino."')";
	$update_disposnibilidade_veiculo = "UPDATE `veiculo` SET `disponivel` = '0' WHERE `veiculo`.`id` = $id_veiculo;";

	if (mysqli_query($conexao,$insert_locacao)) {

		mysqli_query($conexao,$update_disposnibilidade_veiculo);

		mysqli_close($conexao);

		echo "<script> alert ('LOCACAO CRIADA COM SUCESSO!');</script>";

		echo "<script> window.location.href='$url_admin/location.php';</script>";
		
	} else {

		echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL LOCAR O VEICULO.');</script>";

		echo "<script> window.location.href='$url_admin/location.php';</script>";
		
		mysqli_close($conexao);
	}

?>


