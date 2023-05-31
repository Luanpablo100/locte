<?php require('./src/valida_admin.php');

require('../Src/conexao.php');

//Script que faz o select das informações de reserva, incluindo o nome do cliente e modelo e marca do veiculo
$select_reservas = mysqli_query($conexao, "SELECT reserva.*,cliente.nome,veiculo.marca,veiculo.modelo,veiculo.cor,veiculo.placa from reserva JOIN cliente on reserva.idCliente = cliente.id JOIN veiculo ON reserva.idVeiculo = veiculo.id WHERE data_inicio = CURDATE() ORDER BY hora_inicio ASC;");
$select_locacoes = mysqli_query($conexao, "SELECT locacao.*,cliente.nome,veiculo.marca,veiculo.modelo,veiculo.cor,veiculo.placa from locacao JOIN cliente on locacao.idCliente = cliente.id JOIN veiculo ON locacao.idVeiculo = veiculo.id WHERE data_termino = CURDATE() ORDER BY data_termino ASC;");
        
if (mysqli_num_rows($select_locacoes) > 0) {
        
    $dados_locacao = mysqli_fetch_assoc($select_locacoes);
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locte - Gerenciamento de locação</title>
    <link rel="stylesheet" href="../public/style/normalize.css">
    <link rel="stylesheet" href="../public/style/main.css">
    <link rel="shortcut icon" href="../public/img/car.svg">
</head>
<body>
    <header class="header1">
        <a href="/Admin"><h1 class="h1Logo">Locte</h1></a>
        <h1 id="relogio"></h1>
        <nav class="header-nav">
            <a href="location.php"><button class="btn-nova-reserva">Nova locação</button></a>
            <div id="div-menu-hamburguer">
                <img src="../public/img/hambuguer-menu-removebg-preview.png" alt="Menu lateral" class="menuIcon">
            </div>
        </nav>
    </header>
    <main>
        <h1 class="page-title">Reservas hoje</h1>
        <div class="div-content">

                <?php 

                if (mysqli_num_rows($select_reservas) <= 0) {
                    echo "<h2 class='sem-dados-texto'>Não há reservas para hoje!<h2>";
                } else {
                    echo "            
                    <table class='tabela-dados'>
                    <tr>
                      <th>Nome</th>
                      <th>Veículo</th>
                      <th>Cor</th>
                      <th>Placa</th>
                      <th>Horário</th>
                      <th>Ação</th>
                    </tr>
                    ";
                    do {
			    ?>
					
					<tr>
						<td><?php echo $dados_reserva['nome'];?></td>
                        <td><?php echo $dados_reserva['marca'];?>&nbsp<?php echo $dados_reserva['modelo'];?></td>
                        <td><?php echo $dados_reserva['cor'];?></td>
                        <td><?php echo $dados_reserva['placa'];?></td>
                        <td><?php echo $dados_reserva['hora_inicio'];?></td>
						<td><?php echo $dados_reserva['data_inicio'];?></td>
                        <td>X Y Z</td>
					</tr>

				<?php } while ($dados_reserva = mysqli_fetch_assoc($select_reservas));}?>                                   
              </table>


              <h1 class="page-title">Devoluções hoje</h1>
              <?php 

                if (mysqli_num_rows($select_locacoes) <= 0) {
                    echo "<h2 class='sem-dados-texto'>Não há locações!<h2>";
                } else {
                    echo "            
                    <table class='tabela-dados'>
                    <tr>
                      <th>Cliente</th>
                      <th>Veículo</th>
                      <th>Cor</th>
                      <th>Placa</th>
                      <!-- <th>Data início</th> -->
                      <!-- <th>Data devolução</th> -->
                      <th>Horário</th>
                      <th>Ação</th>
                    </tr>
                    ";
                    do {
			    ?>
					
					<tr>
						<td><?php echo $dados_locacao['nome'];?></td>
                        <td><?php echo $dados_locacao['marca'];?>&nbsp<?php echo $dados_locacao['modelo'];?></td>
                        <td><?php echo $dados_locacao['cor'];?></td>
                        <td><?php echo $dados_locacao['placa'];?></td>
						<!-- <td><?php //$hoje = date("Y-m-d"); if ($dados_locacao["data_inicio"] == $hoje) {echo "Hoje";} else {echo $dados_locacao['data_inicio'];}?></td> -->
						<!-- <td><?php //$hoje = date("Y-m-d"); if ($dados_locacao["data_termino"] == $hoje) {echo "Hoje";} else {echo $dados_locacao['data_termino'];}?></td> -->
                        <td><?php echo $dados_locacao['hora_inicio'];?></td>
                        <td>X Y Z</td>
					</tr>

				<?php } while ($dados_locacao = mysqli_fetch_assoc($select_locacoes));}?>                                   
              </table>
        </div>
    </main>
    <aside class="menuLateral hidden" id="asideMenu">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAdVBMVEX///8AAAD19fXQ0NDU1NT5+fmjo6M9PT3z8/OgoKCUlJTR0dFPT0+NjY2QkJD7+/tVVVVJSUmIiIgUFBQbGxtGRkYPDw+oqKg6OjoJCQlRUVEgICC8vLw0NDRAQECampqwsLAlJSUqKiqAgIDAwMBzc3NfX1+rFE+MAAAKaElEQVR4nM2d60LqOhCFUxAQtspWEPBsFXR7zvs/4mlpS5s0l5nMStr1u4Z+JpmVTm6qoOnji/hgLn3+3tMeVLTH/t7/nOLfJoEe5mpNQ6QRvtwr9T4lxBJQqfWB8iiJ8HFWlqd+PmRvBdTrr+qF1JLyLIXw5Qqo1Pxb+GIorWrAshYJDxMIH++b8tR8GrX4OW9faEGoxTDh0w1wIoirefdCi3AtBgk3C9XT/BPykhI93/VfSC1D4SZAeNABS8RX2KvG6WGuv1DQNPyEbyZgifgMfF2+BoAl4s77F37C8wBwZMTnIWDINLyEZ0txSt2toC/N0erO+kbecOMjXFtq8FqLYyGubDVYauurRQ/h0gFYIo4zgDs5AP2+6CZcbl3lKfVrjIj6+sv9Qlt3Q3UR7pfu4irEhzQUHj14AEstXabhINyvvcWVDTU3osUmdLl80UHor8ErYl7TsNqEUYv2v7QThmqw0l3OcHOy24RRi9Y/tRL6gkynjAM4l03ospuGjdBtE7rucjVUGqDDNCyEa1INZkSkAtpNY0AYsAkD8XcGwIBN6BqahkkYtInsiEGb0DUwDZOQU4NZEJmAQ9MwCLmAyfviJ6eJWhF1QppNGIgpTWPFBzRNQyOk2kQ2RHoU7Us3jT4h3SYyIbo/l/zSTKMj3PH74A3xnySAz5Shml3LLndzI2TahIGYIqKyo2hfnWm0hAcJYPm9iEcUAfambVrC+CZa6w79vfgqA+xMoyG0Z9VYiNhwExdFNa37hLa86KiIAMDWNBQKEIoYaxO66mmbivAc6YOmYH3Rl1VjqZq2UcVO3gdbgUxDGEX7Kk1D7VA1WAliGkDA6ntRfdyHH6MLMLohZNUYmp3U4QmLKA03J1QfvGp23qliWogIm+hUAlax9O1phixVhIgFXJwPjR8+YhHjv/rFQzVNi3NVZj2mecEixkZUVlYtqNmm6AjBiJGmAbUJtagBb98W4L4Yg4i1ibqJ9giL0SMqafKFrFkL2BEeHrGI3HADtonNLY3R5WkO4IbKQ0wGqOXaRkRE+2CvaC1f+oJtqPRw84Dtg5t+2XrOeyRfTGMTVkL06IaGmBRwMPcENg1KX4yYfPFodjaKNwnzm0bM5Itb/ShqJyx2mRHT2YSLEG4a/tENJqvWanF+G/yCbS1GRtMQTL5YNHuy/IR1PU02RGwUtQI61kRl8sW0NuElRJuGPVUMS/xeNbAJP+FbhojqWNIcqdnGsS3Btb40vWl8praJAGHyDBzaJpwbSzzrvMHhRs+Gvyb8miATpjSNHDZBIExnGmCb8AEG9syATaNFBE++OGyCRFiAI2odbsBZtc1wLMogRJtGZf1omxDtXau+F9HpKez34MLpg1RCeGLj3xxjUR4h2DSg8toEnRBsGkD5bYJBCI6oMPlGMkzCaSLSAImE4AwcRO6viRhCtC8CRAWkEqJNQ6yFf6gWQzgt06DYBJtwSqZBDDJcwuk0VMJIJo5wKqbBqUEm4TRMgxxFIwgnYRpMQCYhOgMXIdvkC5JwdNNg2EQs4biIvCATSTimL5I+l+SE4AwcQ4GsGo4QPG1DB3RNvsAJRzINrk1ICMtazN8XPZMvCQhHCDcRUVRGmNs0+D4oJixeINvBiIqxCTFhTtOIsgk5Yb6Pqeg+KCXMZRqRNgEgRC+cdmhxlgDKCNFr4OyAkiYqJ0zvi6I+iCBMjSitQQBh2oZKT/wmJEzpixIfBBKmy8DJbAJHmMw0hDbRCEFYNtQUY1RAH6yEIUyR8BfbRCMQIR5RbhONUITFI7ahblGAOMIVNqAuYIekoQixK50U8Bw4ECF271KNCDopBUOIXdLcImLOu4EQYne+dIiQw2AQhNgVv2hEAGEyQAyinBC7pNlElJ93IybELmkeIorDjZQQu6TZhij1RSEhdgdoEkQZIXbniwtRZv0iQux5Mm5EUUSVECa0CSCigDCpTeAQ4wkT24SBGG8a0YQZoqiGGB1RYwkzAwoQIwkTfA+mQowjzGQTBmJcuIkizGYTCMQYwpEAIxEjCLH76HmIEX2RT5g9igoR2YSjAsYgcgmTZNVYiNzRDZMwUVaNhcgMNzzC0aJoX0xEFuEkALmHh3IIsefJCMQKNwzCkaNoX5xwQyecECALkUw4uk3ooiNSCZ+n0gdbkbPhRMKJRNG+qKZBI5wgINk0SITYg8RhoqWKKYTYw/yBIoUbAuGkbEIXBTFMOGFAEmKQENwHwefTEPpiiBAcReer4gOMGIqoAUI04EdZ5vcPtMyQafgJwZMvV8Ci+MIiBkY3XkLw5MtPewv0xzu0XH+48RGCo+j76lZyTkQPIRrwo1f29wVatg/RTQiefHn/0krfg2vR/dXvJARPvrwPTkK4AO8K85mGixBsE++WPbwX6C84ER2EYMCL9Ucu0N9wIdoJwSt+L/bDGw8X6K84+qKVEBxFL9/2/27xdYT+jh3RRpgLsELEhhubaVgIwVk1RxOttQPXogVxSIidfNkePXyV4u4Cd8kSbgaE2Ci6tUdRDTGxL5qEYJsI1WAGRIMQO/lCqMFKR2xDNb76dUJsVm27/EMi3K+xiHq40QixNkEFLBExVy630n2xTwj2wWPgGOqedut0vtgjxNoEcwfoJtmtKB0h+Kx77hbXZFdM3gjBPsjfw4vdS9whtoTgKzLXbMCiOKe5T6MhBN/5EnVo1Ru4L772CbE7XxZnehTtawdGfO4I0TdIxgFWiAl8sSIE37sk2YUNvqbgoSZMcpNyrPB326isd75QENG+qMA3hsjPskBf/KJ+I8uDnGWBRfxP7de40iDnyWAPSTv+UQUOEQMIPdLn+KeKpYclpjTYaSQ40zjuGseHfGPHn05pEcQ06jxfPWoDpPTENmEgymuxSWQ2I29xXwQ20Vryhtrk+dqvJ2FfRB151EcUNtQ2kdkSHkS1iIqifQkj6rF9o9s3vsQ0gnefRUnki12er8vT7KIbKvswf6ricze9PF8/mxiZ0oPahK5I09gue2VoGeEo00gIGGka+nyXntWPmCSB24QcUZ8OMmZm2H0RcTqlV/yTNY35LnN2jYkYd5g/R+xrCo7GG5mEPNNI4YOmmKYxmA4azAHvGbUYe5g/T6y7bY6D+S7LSgWyaSQYqtlFNg3bqgHbahOiaSS1CV1EROuyCOuKIZJpgD+X/CKZhn3dh33VFyHcJLcJXRTTsC+LcKzcC4ab0E3KcIUjqmPdh4MwZBo5bEJX0DRcqwZc60v9poE5pZmnwInTQ5to5F4F7Qk3iceiLvkSG+ZIppNnJbvTNLL5oCmnafhWz/l2IzhqcaQarOQwDe/yQO+OEmu4yWwTuux9cen7E/+uIEu4Ga2J1rL5on95oJ9wN6jF/Dahy5KBW/rTYIG9a6YvjmETugam4bSJRqH9h/q0Degwf5l0xGPoXx7eJdubthm5D7bqRdTgImvSTuebL45oE7puiARA0m719YSaaK12dENZZE06ceDaF0f1QVO1aVAAaYTVtE3cWrVUeqsQg0HmKtq5GPvlbHSb0FWaRsgmGhHPNtmfpgVYIp6I813/A+s2p9F6BTGMAAAAAElFTkSuQmCC" alt="Fechar" class="fecharIcon" id="closeMenu">
        <ul>
            <li>
                Gerenciar
            </li>
            <li>
                <a href="./catalog.php">Veículos</a>
            </li>
            <li>
                <a href="./reservations.php">Reservas</a>
            </li>
            <li>
                <a href="./locations.php">Locações</a>
            </li>
            <li>
                <a href="./users.php">Usuários</a>
            </li>
            <li>
                <form action="../Src/logoff.php">
                    <button>Logoff</button>
                </form>
            </li>
        </ul>
    </aside>
    <script src="../public/scripts/clock.js"></script>
    <script src="../public/scripts/asideMenu.js"></script>
</body>
</html>