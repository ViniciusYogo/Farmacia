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
    <div class="card" style="width: 18rem;">

 
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>

        <?php foreach ($remedio as $remed) : ?>
            <div class="card" style="width: 18rem;">
                <form action="comprar.php" method="post"></form>
                <a href="comprar.php?id=<?= $remed['id']; ?>" target="_blank">
                    <img src="<?php echo $remed['imagem_Remedio']; ?>" class="card-img-top">
                    <div class="card-body">
                        <?php echo $remed['nome_Medicamento']; ?>
                        <?php echo $remed['quantidade_Disponivel']; ?>
                        <?php echo $remed['preco']; ?>
                        <?php echo $remed['categoria']; ?>
                        <?php echo $remed['data_validade']; ?>
                    </div>
                </a>
            </div>
            <br>
        <?php endforeach; ?>

</body>

</html>