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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Remedios</h1>

    <?php foreach ($remedio as $remed) : ?>
        <div class="card">
            <form action="vender.php" method="post"></form>
            <a href="comprar.php?id=<?= $remed['id'];?>" target="_blank">
            <img src="<?php echo $remed['imagem_Remedio']; ?>">
            <?php echo $remed['nome_Medicamento']; ?>
            <?php echo $remed['quantidade_Disponivel']; ?>
            <?php echo $remed['preco']; ?>
            <?php echo $remed['categoria']; ?>
            <?php echo $remed['data_validade']; ?>
            </a>
        </div>
        <br>
    <?php endforeach; ?>

</body>

</html>