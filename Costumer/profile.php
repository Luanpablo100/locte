<?php require('./src/valida_usuario.php');

require('../Src/conexao.php');

$id_conta_usuario = $_SESSION['usuario'];

$select_cliente = mysqli_query($conexao, "SELECT id, usuario FROM conta WHERE usuario = '$id_conta_usuario'");
$dados_cliente = mysqli_fetch_assoc($select_cliente);

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
    <link rel="stylesheet" href="../public/style/new-vehicle.css">
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
        <h1 class="page-title">Completar cadastro de cliente</h1>
        <h1 class="page-title"></h1>
        <div class="div-content">
            <form class="vehicle-form" action="../Src/create_costumer.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="input">
                            <input type="text" class="input-field" required name="nome_cliente"/>
                            <label class="input-label">Nome completo</label>
                    </div>
                    <input type="number" name="id_conta" id= "id_conta" value="<?php echo $dados_cliente['id'];?>" hidden/>
                    <div class="input">
                            <input type="text" class="input-field" required name="endereco_cliente"/>
                            <label class="input-label">Endereço</label>
                        </div>
                        <div class="input">
                            <input type="email" class="input-field" required name="email_cliente"/>
                            <label class="input-label">Email</label>
                        </div>
                        <div class="input-group">
                        <div class="radio-group">
                                    <div>
                                        <label for="tipo_cpf">CPF</label>
                                        <input type="radio" class="input-radio" required id="tipo_cpf" name="tipo_documento" value="CPF"/>
                                    </div>
                                    <div>
                                        <label for="tipo_cnh">CNH</label>
                                        <input type="radio" class="input-radio" required id="tipo_cnh" name="tipo_documento" value="CNH"/>
                                    </div>
                                    <div>
                                        <label for="tipo_rg">RG</label>
                                        <input type="radio" class="input-radio" required id="tipo_rg" name="tipo_documento" value="RG"/>
                                    </div>
                                </div>
                       
                        
                    </div>
                    <div class="input-group-2">
                        <div class="input">
                            <input type="number" class="input-field" required name="telefone_cliente" maxlength="14"/>
                            <label class="input-label">Telefone</label>
                        </div>
                    </div>
                    <div class="input">
                            <input type="text" class="input-field" required name="nmr_documento"/>
                            <label class="input-label">Número do documento</label>
                    </div>
                    <div class="input-group">
                        <h3 style="color:black;">Foto do documento</h3>
                        <img src="../public/img/enquete-h.png" alt="Icone documento" id="input-doc-img">
                        <input type="file" accept="image/png"  name="imagem_documento" required>
                    </div>
                    
                    <button class="action-button">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="../public/scripts/attachImgNewCar.js"></script>
    <script src="../public/scripts/asideMenuUser.js"></script>
</body>
</html>