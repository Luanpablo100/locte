<?php require('./src/valida_usuario.php');

// require('../Src/conexao.php');
require __DIR__ . '/../Src/conexao.php';

$select_veiculos = mysqli_query($conexao, "SELECT id, marca, modelo, valor, quilometragem FROM veiculo WHERE disponivel = 1");

$dadosVeiculos = array();
while ($row = mysqli_fetch_assoc($select_veiculos)) {
    $dadosVeiculos[] = $row;
}
$dadosVeiculos_json = json_encode($dadosVeiculos);

$usuario_cliente = $_SESSION['usuario'];

$select_cliente = mysqli_query($conexao, "SELECT c.*, cl.* FROM conta c JOIN cliente cl ON cl.idConta = c.id WHERE c.usuario = '$usuario_cliente';");

$dadosCliente = array();
while ($row = mysqli_fetch_assoc($select_cliente)) {
    $dadosCliente[] = $row;
}
$dadosCliente_json = json_encode($dadosCliente);

if (isset($_GET['id_vehicle'])) {
    $id_veiculo = $_GET['id_vehicle'];
    $select_veiculo_desejado = mysqli_query($conexao, "SELECT id, marca, modelo, valor FROM veiculo WHERE id = $id_veiculo");

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
    <link rel="stylesheet" href="../public/style/costumer.css">
    <link rel="shortcut icon" href="../public/img/car.svg">
</head>
<body>
    <header class="header1">
        <a href="/Costumer"><h1 class="h1Logo">Locte</h1></a>
        <h1 id="relogio"></h1>
        <nav class="header-nav">
            <div id="div-menu-hamburguer">
                <img src="../public/img/hambuguer-menu-removebg-preview.png" alt="Menu lateral" class="menuIcon">
            </div>
        </nav>
    </header>
    <main>
        <h1 class="page-title">Reservar veículo</h1>
        <div class="div-content">
            <div class="container">
                <!-- code here -->
                <div class="card">
                    <form class="card-form" action="../Src/criar_reserva.php" method="POST">
                        <h2 class="header-description">Dados do cliente</h2>
                        <div class="input">
                                <label class="">Clientes</label>

                                <?php
                                if (mysqli_num_rows($select_cliente) > 0) {
                                    echo '<input type="text" class="input-field" id="input_cliente" name="input_cliente" value="" disabled/><input type="text" hidden class="input-field" id="select_cliente" name="select_cliente" disabled/>';
                                } else {
                                    echo '<p class="paragraph-black">Preecha seus dados na <a href="profile.php">página de perfil</a> antes de continuar!';
                                };
                                ?>
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

                                <input type="number" class="input-field" id="km_veiculo" name="km_veiculo" hidden/>

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
                                <select name="modelo_veiculo" id="modelo_veiculo" required  disabled>
                                    <option>Selecione o modelo</option>
                                </select>'?>

                                <?php }; ?>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <div class="input">
                                <input type="date" class="input-field" required onchange="calcularDiferencaHoras()" id="data_inicio" name="data_inicio" disabled/>
                                <label class="input-label">Data de retirada</label>
                            </div>
                            <div class="input">
                                <input type="date" class="input-field" required onchange="calcularDiferencaHoras()" id="data_entrega" name="data_entrega" disabled/>
                                <label class="input-label">Data de entrega</label>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <div class="input">
                                <input type="time" class="input-field" required onchange="calcularDiferencaHoras()" id="hora_inicio" name="hora_inicio" disabled/>
                                <label class="input-label">Hora de retirada</label>
                            </div>
                            <div class="input">
                                <input type="time" class="input-field" required onchange="calcularDiferencaHoras()" id="hora_entrega" name="hora_entrega" disabled/>
                                <label class="input-label">Hora de entrega</label>
                            </div>
                        </div>

                        <div class="location-values">
                            <div>
                                <h3>Valor da diária do veículo</h3>
                                <h2 id="card_vehicle_value">R$0</h2>
                            </div>
                            <div>
                                <h3>Valor da locação</h3>
                                <input type="number" class="input-field" id="valor_locacao" name="valor_locacao" step="0.01" disabled/>
                            </div>
                        </div>

                        <div class="action">
                                <?php
                                    if (mysqli_num_rows($select_cliente) > 0) {
                                        echo '<button class="action-button">Reservar</button>';
                                    } else {
                                        echo '';
                                    };
                                ?>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        var dadosVeiculos = <?php echo $dadosVeiculos_json; ?>;

        var selectMarca = document.getElementById('marca_veiculo');
        var selectModelo = document.getElementById('modelo_veiculo');

        let cardValorVeiculo = document.getElementById("card_vehicle_value")
        let inputKmVeiculo = document.getElementById("km_veiculo")

        let dataRetirada = document.getElementById("data_inicio")
        let horaRetirada = document.getElementById("hora_inicio")
        let dataEntrega = document.getElementById("data_entrega")
        let horaEntrega = document.getElementById("hora_entrega")

        function removeDisabled() {
            dataRetirada.removeAttribute('disabled');
            horaRetirada.removeAttribute('disabled');
            dataEntrega.removeAttribute('disabled');
            horaEntrega.removeAttribute('disabled');
        }
    </script>

    <?php if (!isset($_GET['id_vehicle'])) { ?>
    <script>

        for (var i = 0; i < dadosVeiculos.length; i++) {
            var option = document.createElement('option');
            option.text = dadosVeiculos[i].marca;
            selectMarca.add(option);
        }

        function atualizarModelos() {

            // selectModelo.innerHTML = '<option>Selecione o modelo</option>'
            selectModelo.innerHTML = ''
            selectModelo.removeAttribute('disabled');


            for (var i = 0; i < dadosVeiculos.length; i++) {
                if (dadosVeiculos[i].marca === selectMarca.value) {
                    var option = document.createElement('option');
                    option.text = dadosVeiculos[i].modelo;
                    option.value = dadosVeiculos[i].id;
                    selectModelo.add(option);
                }
            }

            if (selectMarca.value != "Selecione a marca" && selectModelo != "Selecione o modelo") {
                removeDisabled();

                for (var i = 0; i < dadosVeiculos.length; i++) {
                    if (dadosVeiculos[i].id === selectModelo.value) {
                        cardValorVeiculo.innerText = "R$" + dadosVeiculos[i].valor
                        inputKmVeiculo.value = dadosVeiculos[i].quilometragem
                    }
                }
            }

        }

    </script>

<?php } else if (isset($_GET['id_vehicle'])) {?>
    <script>
        removeDisabled();
        cardValorVeiculo.innerText = "R$" + dadosVeiculos[0].valor
        inputKmVeiculo.value = dadosVeiculos[0].quilometragem
    </script>
<?php };?>



<?php
    if (mysqli_num_rows($select_cliente) > 0) { ?>
        <script>
        var dadosCliente = <?php echo $dadosCliente_json; ?>;
        var inputCliente = document.getElementById('input_cliente');
        var selectCliente = document.getElementById('select_cliente');

        inputCliente.value = `${dadosCliente[0].nome} - ${dadosCliente[0].email}`
        selectCliente.value = `${dadosCliente[0].id}`
        selectCliente.value = `1`

</script>

    <?php } else { ?>

    <?php };?>


<script>

function calcularDiferencaHoras() {
    let dataRetirada = document.getElementById("data_inicio").value
    let horaRetirada = document.getElementById("hora_inicio").value
    let dataEntrega = document.getElementById("data_entrega").value
    let horaEntrega = document.getElementById("hora_entrega").value

    var selectModelo = document.getElementById('modelo_veiculo');

    let inputValorLocacao = document.getElementById("valor_locacao")

    var dadosVeiculos = <?php echo $dadosVeiculos_json; ?>;

    if(dataRetirada != "" && horaRetirada != "" && dataEntrega != "" && horaEntrega != "") {

        var dateHoraRetirada = new Date(dataRetirada + "T" + horaRetirada);
        var dataHoraEntrega = new Date(dataEntrega + "T" + horaEntrega);

        // Calcular a diferença em milissegundos
        var diff = Math.abs(dataHoraEntrega - dateHoraRetirada);
    
        // Converter a diferença em horas
        var horaTotalLocacao = Math.floor(diff / (1000 * 60 * 60));
    
        // Retornar o resultado

<?php if (!isset($_GET['id_vehicle'])) {?>
        for (var i = 0; i < dadosVeiculos.length; i++) {
            if (dadosVeiculos[i].id === selectModelo.value) {

                let valorHoraVeiculo = dadosVeiculos[i].valor / 24
                let valorLocação = (horaTotalLocacao * valorHoraVeiculo).toFixed(2)

                inputValorLocacao.value = valorLocação

            }
        }
<?php } else {?>
    let valorHoraVeiculo = dadosVeiculos[0].valor / 24
    let valorLocação = (horaTotalLocacao * valorHoraVeiculo).toFixed(2)

    inputValorLocacao.value = valorLocação

<?php };?>
    }
}
</script>
</body>
</html>