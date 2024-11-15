<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.myloview.com.br/quadros/farmacia-icone-700-11593425.jpg" type="image/png">
    <link rel="stylesheet" href="cadastrar.css">
    <title>Farmacia</title>
</head>

<body>
    <h1><a href="menu.php">REMÉDIOS</a></h1>
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
        <label for="inputCategoria">Categoria</label>
        <select name="inputCategoria" required>
            <option selected disabled >Selecione uma categoria</option>
            <option value="Antibiótico">Antibiótico</option>
            <option value="Analgésico">Analgésico</option>
            <option value="Anti-inflamatório">Anti-inflamatório</option>
            <option value="Vitaminas">Vitaminas</option>
            <option value="Anti-hipertensivo">Anti-hipertensivo</option>
            <option value="Dermatológico">Dermatológico</option>
            <option value="Outros">Outros</option>
        </select>
        <br>
        <label>Data de Validade</label>
        <input type="date" name="inputValidade">
        <br>
        <label>Link de imgaem</label>
        <input type="texr" name="inputLink">
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
$imagem = isset($_POST['inputLink']) ? $_POST['inputLink'] : '';


$sql = $pdo->prepare('INSERT INTO medicamento(nome_Medicamento , preco , quantidade_Disponivel , categoria , data_validade, imagem_Remedio) VALUES(:nomeReme,:preco,:quant,:catego,:vali,:imagem)');

$sql->bindValue(':nomeReme', $nomeRemedio);
$sql->bindValue(':preco', $preco);
$sql->bindValue(':quant', $quantidade);
$sql->bindValue(':catego', $categoria);
$sql->bindValue(':vali', $validade);
$sql->bindValue(':imagem', $imagem);

if ($nomeRemedio != "" and $preco != 0 and $quantidade != 0 and $categoria != "" and $validade != null) {
    $sql->execute();
    header("Location:visualizar.php");
    exit;
}

?>