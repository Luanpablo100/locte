<?php require('src/valida_usuario.php');

require('../Src/conexao.php');

$select_veiculos = mysqli_query($conexao, "SELECT marca, modelo, MAX(codigo_imagem) AS imagem, COUNT(*) AS total, MIN(valor) AS valor FROM veiculo WHERE disponivel = 1 GROUP BY marca, modelo ORDER BY marca, modelo;");

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
    <link rel="stylesheet" href="../public/style/catalog.css">
    <link rel="shortcut icon" href="../public/img/car.svg">
</head>
<body>
    <header class="header1">
        <a href="/Costumer"><h1 class="h1Logo">Locte</h1></a>
        <h1 id="relogio"></h1>
        <nav class="header-nav">
            <div id="div-menu-hamburguer">
                <img src="../public/img/do-utilizador.png" alt="icone-Usuario" class="menuIcon">
            </div>
        </nav>
    </header>
    <main>
        <h1 class="page-title">Veículos</h1>
        <div class="div-content">
        <?php if (mysqli_num_rows($select_veiculos) > 0) { do {?>
				
            <a href="vehicles.php?brand=<?php echo $dados_veiculos['marca'];?>&model=<?php echo $dados_veiculos['modelo'];?>">
                <div class="vehicle-card">
                    <div class="vehicle-name">
                        <h2 class="vehicle-name"><?php echo $dados_veiculos['marca'];?>&nbsp<?php echo $dados_veiculos['modelo'];?></h2>
                    </div>
                    <img src="data:image/png;base64,<?php echo base64_encode($dados_veiculos['imagem']);?>" alt="<?php echo $dados_veiculos['marca'];?>&nbsp<?php echo $dados_veiculos['modelo'];?>">
                    <div class="description">
                        <div>
                            <h2>Diária <span>R$ <?php echo $dados_veiculos['valor'];?></span></h2>
                        </div>
                        <div>
                            <h3><?php echo $dados_veiculos['total'];?> disponíveis</h3>
                        </div>
                    </div>
                </div>
            </a>
        		
		<?php } while ($dados_veiculos = mysqli_fetch_assoc($select_veiculos));};?>
        </div>
    </main>
</body>
</html>