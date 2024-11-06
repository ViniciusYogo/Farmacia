<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <h1><a href="menu.php">REMEDIOS</a></h1>
    <br>
    <form action="cadastrar.php" method="post">
        <label>Nome do remédio</label>
        <input type="text" name="inputNome" placeholder="Nome">
        <br>
        <label>Preço</label>
        <input type="number" min=1 step="0.01" name="inputPreco" placeholder="Preço">
        <br>
        <label>Quantidade disponível</label>
        <input type="number" name="inputQuantidade" placeholder="Quantidade">
        <br>
        <label>Categoria</label>
        <input type="text" name="inputCategoria" placeholder="Categoria">
        <br>
        <label>Data de Validade</label>
        <input type="date" name="inputValidade">
        <br>

        <button type="submit">Cadastrar remédio</button>
    </form>
</body>

</html>

<?php

$nomeRemedio = isset($_POST['inputNome']) ? $_POST['inputNome'] : '';
$quantidade = isset($_POST['inputQuantidade']) ? $_POST['inputQuantidade'] : '';
$categoria = isset($_POST['inputCategoria']) ? $_POST['inputCategoria'] : '';
$preco = isset($_POST['inputPreco']) ? $_POST['inputPreco'] : '';
$validade = isset($_POST['inputValidade']) ? $_POST['inputValidade'] : '';


$sql = $pdo->prepare('INSERT INTO medicamento(nome_Medicamento , preco , quantidade_Disponivel , categoria , data_validade) VALUES(:nomeReme,:preco,:quant,:catego,:vali)');

$sql->bindValue(':nomeReme', $nomeRemedio);
$sql->bindValue(':preco', $preco);
$sql->bindValue(':quant', $quantidade);
$sql->bindValue(':catego', $categoria);
$sql->bindValue(':vali', $validade);

if ($nomeRemedio != "" and $preco != 0 and $quantidade != 0 and $categoria != "" and $validade != null) {
    $sql->execute();
    header("Location:visualizar.php");
    exit;
}

?>