<?php require('./src/valida_admin.php');

// require('../Src/conexao.php');
require __DIR__ . '/../Src/conexao.php';

$select_veiculos = mysqli_query($conexao, "SELECT id, marca, modelo FROM veiculo WHERE disponivel = 1 GROUP BY marca, modelo ORDER BY marca, modelo");

$dadosVeiculos = array();
while ($row = mysqli_fetch_assoc($select_veiculos)) {
    $dadosVeiculos[] = $row;
}
$dadosVeiculos_json = json_encode($dadosVeiculos);

$select_clientes = mysqli_query($conexao, "SELECT id, nome, email FROM cliente ORDER BY nome");

$dadosClientes = array();
while ($row = mysqli_fetch_assoc($select_clientes)) {
    $dadosClientes[] = $row;
}
$dadosClientes_json = json_encode($dadosClientes);

if (isset($_GET['id_vehicle'])) {
    $id_veiculo = $_GET['id_vehicle'];
    $select_veiculo_desejado = mysqli_query($conexao, "SELECT id, marca, modelo FROM veiculo WHERE id = $id_veiculo");

    if (mysqli_num_rows($select_veiculo_desejado) > 0) {
        $dados_veiculo_desejado = mysqli_fetch_assoc($select_veiculo_desejado);
    }
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
    <link rel="stylesheet" href="../public/style/reservation.css">
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
        <h1 class="page-title">Nova locação</h1>

        <h3 class="page-title">Em desenvolvimento - página modelo</h3>
        <div class="div-content">
            <div class="container">
                <!-- code here -->
                <div class="card">
                    <form class="card-form" action="/">
                        <h2 class="header-description">Dados do cliente</h2>
                        <div class="input">
                                <label class="">Clientes</label>
                                <select name="select_cliente" id="select_cliente" required>
                                    <option>Selecione o cliente</option>
                                </select>
                            </div>

                        <h2 class="header-description">Dados do veículo</h2>
                        <div class="input-group">
                            <div class="input">
                                <label class="">Marca</label>
                                <?php 
                                    if (isset($dados_veiculo_desejado['id'])) {
                                        echo '<select name="marca_veiculo" id="marca_veiculo" required>
                                        <option>'.$dados_veiculo_desejado['marca'].'</option>
                                    </select>';
                                    
                                ?>
                                
                                <?php } else { echo '
                                <select name="marca_veiculo" id="marca_veiculo" onchange="atualizarModelos()" required>
                                    <option>Selecione a marca</option>
                                </select>'?>

                                <?php }; ?>

                            </div>
                            <div class="input">
                                <label class="">Modelo</label>
                                <?php 
                                    if (isset($dados_veiculo_desejado['id'])) {
                                        echo '<select name="modelo_veiculo" id="modelo_veiculo" required>
                                        <option>'.$dados_veiculo_desejado['modelo'].'</option>
                                    </select>';
                                    
                                ?>
                                
                                <?php } else { echo '
                                <select name="modelo_veiculo" id="modelo_veiculo" required>
                                    <option>Selecione o modelo</option>
                                </select>'?>

                                <?php }; ?>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <div class="input">
                                <input type="date" class="input-field" required/>
                                <label class="input-label">Data de retirada</label>
                            </div>
                            <div class="input">
                                <input type="date" class="input-field" required/>
                                <label class="input-label">Data de retirada</label>
                            </div>
                        </div>
                        
                        <div class="input-radio">
                            <label class="input-label-radio main-label-radio">Método de pagamento</label>
                            <div class="radio-group">
                                <div>
                                    <label for="avista" >À vista</label>
                                    <input type="radio" class="input-field" required id="avista" name="pagamento" value="Avista"/>
                                </div>
                                <div>
                                    <label for="credito">Crédito</label>
                                    <input type="radio" class="input-field" required id="credito" name="pagamento" value="Crédito"/>
                                </div>
                                <div>
                                    <label for="debito">Débito</label>
                                    <input type="radio" class="input-field" required id="debito" name="pagamento" value="Débito"/>
                                </div>
                            </div>
                        </div>
                        <div class="action">
                            <button class="action-button">Locar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <aside class="menuLateral hidden" id="asideMenu">
        <img src="data:image/png;base64,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" alt="Fechar" class="fecharIcon" id="closeMenu">
        <ul>
            <li>
                Gerenciar
            </li>
            <li>
                <a href="catalog.php">Veículos</a>
            </li>
            <li>
                <a href="reservations.php">Reservas</a>
            </li>
            <li>
                <a href="./locations.php">Locações</a>
            </li>
            <li>
                <a href="users.php">Usuários</a>
            </li>
            <li>
                <form action="../Src/logoff.php">
                    <button>Logoff</button>
                </form>
            </li>
        </ul>
    </aside>
    <?php if (!isset($_GET['id_vehicle'])) { ?>
    <script>

        var dadosVeiculos = <?php echo $dadosVeiculos_json; ?>;
        
        var selectMarca = document.getElementById('marca_veiculo');
        var selectModelo = document.getElementById('modelo_veiculo');


            for (var i = 0; i < dadosVeiculos.length; i++) {
                    var option = document.createElement('option');
                    option.text = dadosVeiculos[i].marca;
                    selectMarca.add(option);
            }

        function atualizarModelos() {

            // selectModelo.innerHTML = '<option>Selecione o modelo</option>'
            selectModelo.innerHTML = ''


            for (var i = 0; i < dadosVeiculos.length; i++) {
                if (dadosVeiculos[i].marca === selectMarca.value) {
                    var option = document.createElement('option');
                    option.text = dadosVeiculos[i].modelo;
                    selectModelo.add(option);
                }
            }
        }


    </script>

<?php }?>

<script>
    var dadosClientes = <?php echo $dadosClientes_json; ?>;
    var selectCliente = document.getElementById('select_cliente');

    for (var i = 0; i < dadosClientes.length; i++) {
        var option = document.createElement('option');
        option.text = `${dadosClientes[i].nome} - ${dadosClientes[i].email}` ;
        selectCliente.add(option);
    }
    
</script>
    <script src="../public/scripts/clock.js"></script>
    <script src="../public/scripts/asideMenu.js"></script>
</body>
</html>