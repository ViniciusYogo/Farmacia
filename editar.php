<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.myloview.com.br/quadros/farmacia-icone-700-11593425.jpg" type="image/png">
    <title>Farmacia</title>
</head>

<body>
    <h1><a href="menu.php">REMEDIOS</a></h1>

    <form action="editar.php" method="get">
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
        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
        <button type="submit">Redefinir remédio</button>
    </form>
</body>

</html>

<?php

$id = $_GET['id'];
$nomeRemedio = $_GET['inputNome'];
$preco = $_GET['inputPreco'];
$quantidade = $_GET['inputQuantidade'];
$categoria = $_GET['inputCategoria'];
$validade = $_GET['inputValidade']  ;


$sql = $pdo->prepare("UPDATE medicamento SET nome_Medicamento = :nomeReme, preco = :preco, quantidade_Disponivel = :quant, categoria = :catego, data_validade = :vali WHERE id = :id");

$sql->bindValue(':id', $id);
$sql->bindValue(':nomeReme', $nomeRemedio);
$sql->bindValue(':preco', $preco);
$sql->bindValue(':quant', $quantidade);
$sql->bindValue(':catego', $categoria);
$sql->bindValue(':vali', $validade);

if ($nomeRemedio != "" and $preco != 0 and $quantidade != 0 and $categoria != "") {
    $sql->execute();
    header("Location: visualizar.php");
    exit;
}
?>