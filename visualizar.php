<?php
require 'config.php';

$sql = $pdo->query('SELECT * FROM medicamento');

$remedio = [];

//FETCH_ASSOC é para retornar uma array associativa (Uma arrey que não é um indice 123 e sim podendo ser qualquer coisa.)

if ($sql->rowCount() > 0) {
    $remedio = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>REMEDIOS</h1>
    <table border="2px">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome do Remédio</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Categoria</th>
            <th scope="col">Validade</th>
            <th scope="col">Ação</th>
        </tr>
        <?php foreach ($remedio as $remed) : ?>
            <tr>
                <td><?php echo $remed['id']; ?></td>
                <td><?php echo $remed['nome_Medicamento']; ?></td>
                <td><?php echo $remed['preco']; ?></td>
                <td><?php echo $remed['quantidade_Disponivel']; ?></td>
                <td><?php echo $remed['categoria']; ?></td>
                <td><?php echo $remed['data_validade']; ?></td>
                <td><a href="excluir.php?id=<?= $remed['id'];?>">Excluir</a></td>
                <td><a href="editar.php?id=<?= $remed['id'];?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>