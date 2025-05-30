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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="https://img.myloview.com.br/quadros/farmacia-icone-700-11593425.jpg" type="image/png">
    <link rel="stylesheet" href="menu.css">
    <title>Farmacia</title>
</head>

<body>
    <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">---</button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <button><a href="cadastrar.php">Cadastrar remédios</a></button>
            <br>
            <br>
            <button><a href="visualizar.php">Visualizar remédios</a></button>
        </div>
    </div>
    <div class="container">
        <div class="row gap-4">
            <?php foreach ($remedio as $remed) : ?>
                <div class="card" style="width: 18rem;">
                    <form action="comprar.php" method="post"></form>
                    <a href="comprar.php?id=<?= $remed['id']; ?>" target="_blank">
                        <h5 class="card-title"><?php echo $remed['nome_Medicamento']; ?></h5>
                        <img src="<?php echo $remed['imagem_Remedio']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h3>
                                <?php echo ("R$ $remed[preco]") ?>
                            </h3>

                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>