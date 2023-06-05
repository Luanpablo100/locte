<?php require('src/valida_usuario.php');

require('../Src/conexao.php');

$marca_veiculo = $_GET['brand'];
$modelo_veiculo = $_GET['model'];

$select_veiculos = mysqli_query($conexao, "SELECT * FROM veiculo WHERE marca ='$marca_veiculo' AND modelo = '$modelo_veiculo' AND disponivel = 1 ORDER BY ano DESC;");
            
    if (mysqli_num_rows($select_veiculos) > 0) {
        
        $dados_veiculos = mysqli_fetch_assoc($select_veiculos);
        
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
    <link rel="stylesheet" href="../public/style/vehicles.css">
    <link rel="shortcut icon" href="../public/img/car.svg">
</head>
<body>
    <header class="header1">
        <a href="/Costumer"><h1 class="h1Logo">Locte</h1></a>
        <h1 id="relogio"></h1>
        <nav class="header-nav">
            <a href="location.php"><button class="btn-nova-reserva">Nova locação</button></a>
            <div id="div-menu-hamburguer">
                <img src="../public/img/hambuguer-menu-removebg-preview.png" alt="Menu lateral" class="menuIcon">
            </div>
        </nav>
    </header>
    <main>
        <h1 class="page-title"><?php echo $marca_veiculo;?>&nbsp<?php echo $modelo_veiculo;?></h1>
        <div class="div-content">

                <?php 

                if (mysqli_num_rows($select_veiculos) <= 0) {
                    echo "<h1 class='sem-dados-texto'>Não há veiculos do tipo ". $marca_veiculo . " ". $modelo_veiculo. " a serem listados!<h1>";
                } else {
                    echo "            
                    <table class='tabela-dados'>
                    <tr>
                        <th>Foto</th>
                        <th>Placa</th>
                        <th>Ano</th>
                        <th>Cor</th>
                        <th>Quilometragem</th>
                        <th>Diária</th>
                        <th>Ação</th>
                    </tr>
                    ";
                    do {
			    ?>
					    <tr>
                            <td>
                                <img src="data:image/png;base64,
                                    <?php echo base64_encode($dados_veiculos['codigo_imagem']);
                                    ?>"
                                    class="img-list"
                                />
                            </td>
						    <td><?php echo $dados_veiculos['placa'];?></td>
                            <td><?php echo $dados_veiculos['ano'];?></td>
                            <td><?php echo $dados_veiculos['cor'];?></td>
                            <td><?php echo $dados_veiculos['quilometragem'];?> KM</td>
                            <td>R$ <?php echo $dados_veiculos['valor'];?></td>
                            <td><?php echo "<a href='reservate-vehicle.php?id_vehicle=". $dados_veiculos['id'] ."'>Reservar</a>";?>
</td>
					    </tr>

				<?php } while ($dados_veiculos = mysqli_fetch_assoc($select_veiculos));}?>                                   
              </table>
        </div>
    </main>
</body>
</html>