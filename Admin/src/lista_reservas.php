<?php require('valida_admin.php');

	require('../../Src/conexao.php');


	$select_reservas = mysqli_query($conexao, "SELECT reserva.*,cliente.nome,veiculo.marca,veiculo.modelo from reserva JOIN cliente on reserva.idCliente = cliente.id JOIN veiculo ON reserva.idVeiculo = veiculo.id ORDER BY data_hora_inicio ASC;");
				
	
		if (mysqli_num_rows($select_reservas) > 0) {
			
			$dados_reserva = mysqli_fetch_assoc($select_reservas);
			
		} else {
			
			echo "<script> alert ('NÃO EXISTEM RESERVAS CADASTRADOS!');</script>";
				
			echo "<script> window.location.href='$url_admin/';</script>";
			
			
		}


?>



		<div class="estila_tabela">

			<div><h1>Reservas</h1></div>

				<table>
					
					<tr class="tabela_cabecalho">

						<td>Nome</td>
                        <td>Marca</td>
						<td>Modelo</td>
                        <td>Hora inicio</td>
						<td colspan="2">Ação</td>

					</tr>



				<?php do{


					?>
					
					<tr>

						<td><?php echo $dados_reserva['nome'];?></td>
                        <td><?php echo $dados_reserva['marca'];?></td>
                        <td><?php echo $dados_reserva['modelo'];?></td>
						<td><?php echo $dados_reserva['data_hora_inicio'];?></td>
                        <td>X Y Z</td>
						<td>

							<!-- <a href="editar.php?codigo_curso=<?php //echo $dados_reserva['codigo_curso'];?>"> -->
								<!-- <img src="../../img/editar.png" class="botao_acao" title="Editar"> -->
							<!-- </a> -->
						</td>

						<td>

							<!-- <a href="javascript:func()" onclick="confirmar_exclusao('<?php //echo $dados_reserva['codigo_curso'];?>')">
								<img src="../../img/excluir.png" class="botao_acao" title="Excluir">
							</a> -->
						</td>
						
					</tr>

				<?php }while ($dados_reserva = mysqli_fetch_assoc($select_reservas));?>

				</table>

		</div>

</body>

</html>