<?php

require('../../Src/conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o ID do veículo está presente, indicando uma atualização
    if (isset($_POST['id_veiculo'])) {
        $id_veiculo = $_POST['id_veiculo'];
        $valor_veiculo = $_POST['valor_veiculo'];

        $update_veiculo = "UPDATE veiculo SET valor = '".$valor_veiculo."' WHERE id = $id_veiculo";

        if (mysqli_query($conexao, $update_veiculo)) {
            mysqli_close($conexao);
            echo "<script> alert ('VEICULO ATUALIZADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url_admin/catalog.php';</script>";
        } else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";
            echo "<script> window.location.href='$url_admin/catalog.php';</script>";
            mysqli_close($conexao);
        }
    } else {
        // Realiza o cadastro de um novo veículo
        $id_usuario = $_POST['tipo_veiculo'];
        $placa_veiculo = $_POST['placa_veiculo'];
        $marca_veiculo = $_POST['marca_veiculo'];
        $modelo_veiculo = $_POST['modelo_veiculo'];
        $ano_veiculo = $_POST['ano_veiculo'];
        $cor_veiculo = $_POST['cor_veiculo'];
        $quilometragem_veiculo = $_POST['quilometragem_veiculo'];
        $tmp_imagem_veiculo = $_FILES['imagem_veiculo']['tmp_name'];

        if ($tmp_imagem_veiculo != "none") {
            $tamanho = $_FILES['imagem_veiculo']['size'];
            $fp = fopen($tmp_imagem_veiculo, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);
        } else {
            $conteudo = "";
        }

        $valor_veiculo = $_POST['valor_veiculo'];

        $insert_veiculo = "INSERT INTO veiculo (tipo, placa, marca, modelo, ano, cor, quilometragem, codigo_imagem, valor) VALUES ('".$tipo_veiculo."','".$placa_veiculo."','".$marca_veiculo."','".$modelo_veiculo."','".$ano_veiculo."','".$cor_veiculo."','".$quilometragem_veiculo."','".$conteudo."','".$valor_veiculo."')";

        if (mysqli_query($conexao, $insert_veiculo)) {
            mysqli_close($conexao);
            echo "<script> alert ('VEICULO CADASTRADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url_admin/catalog.php';</script>";
        } else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";
            echo "<script> window.location.href='$url_admin/catalog.php';</script>";
            mysqli_close($conexao);
        }
    }
}

?>
