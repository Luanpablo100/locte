<?php require('./src/valida_usuario.php');

require('../Src/conexao.php');

$select_reservas = mysqli_query($conexao, "SELECT reserva.*,cliente.nome,veiculo.marca,veiculo.modelo,veiculo.cor,veiculo.placa from reserva JOIN cliente on reserva.idCliente = cliente.id JOIN veiculo ON reserva.idVeiculo = veiculo.id WHERE data_inicio = CURDATE() ORDER BY hora_inicio ASC;");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locte - Locação de veículos</title>
    <link rel="stylesheet" href="../public/style/normalize.css">
    <link rel="stylesheet" href="../public/style/main.css">
    <link rel="stylesheet" href="../public/style/costumer.css">
    <link rel="shortcut icon" href="../public/img/car.svg">
</head>
<body>
    <header class="header1">
        <a href="/Costumer"><h1 class="h1Logo">Locte</h1></a>
        <h1 id="relogio"></h1>
        <nav class="header-nav">
            <div id="div-menu-hamburguer">
                <img src="../public/img/do-utilizador.png" alt="Menu lateral" class="menuIcon">
            </div>
            <div class="dropdown-user hidden" id="dropdown-user">
                <ul>
                    <li><a href="catalog.php">Catálogo</a></li>
                    <li><a href="profile.php">Perfil</a></li>
                    <li><a href="../Src/logoff.php">Logoff</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="div-content">
            <h1 style="margin-left:20px;color:black;">Olá, <?php echo $_SESSION['usuario']?>!</h1>
            <div class="banners">
                <a href="profile.php">
                    <div id="banner-register">
                        <h2>Complete seu cadastro</h2>
                    </div>
                </a> 
                <a href="catalog.php">
                    <div id="banner-catalog">
                        <h2>Confira nosso catalogo de veiculos</h2>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <script src="../public/scripts/asideMenuUser.js"></script>
</body>
</html>