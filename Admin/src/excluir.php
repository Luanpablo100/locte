<?php

require('../../Src/conexao.php');


	$codigo_conta = $_POST['id_user'];
    $codigo_veiculo = $_POST['id_vehicle'];
    $codigo_locacao = $_POST['id_location'];
    $codigo_reserva = $_POST['id_reservation'];

    if ($codigo_conta != "") {
        $tabela = "conta";
        $coluna = $codigo_conta;

    } else if ($codigo_veiculo != "") {
        $tabela = "veiculo";
        $coluna = $codigo_veiculo;

    }else if ($codigo_locacao != "") {
        $tabela = "locacao";
        $coluna = $codigo_locacao;

    }else if ($codigo_reserva != "") {
        $tabela = "reserva";
        $coluna = $codigo_reserva;
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