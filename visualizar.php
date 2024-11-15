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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.myloview.com.br/quadros/farmacia-icone-700-11593425.jpg" type="image/png">
    <link rel="stylesheet" href="visualizar.css">
    <title>Farmacia</title>
</head>

<body>
    <h1><a href="menu.php">REMÉDIOS</a></h1>
    <br>
    <br>
    <h2>Pesquisar:</h2>
    <input type="text" id="inputBusca">
    <br><br>
    <div class="table-responsive-sm">

        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark sticky-top">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Remédio</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Validade</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody id="tabelaRemedio">
                <?php foreach ($remedio as $remed) : ?>
                    <tr>
                        <td><?php echo $remed['id']; ?></td>
                        <td><?php echo $remed['nome_Medicamento']; ?></td>
                        <td><?php echo $remed['quantidade_Disponivel']; ?></td>
                        <td><?php echo $remed['preco']; ?></td>
                        <td><?php echo $remed['categoria']; ?></td>
                        <td><?php echo $remed['data_validade']; ?></td>
                        <td><a href="excluir.php?id=<?= $remed['id']; ?>">Excluir</a>
                            <a href="editar.php?id=<?= $remed['id']; ?>">Editar</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

<script src="eventos.js"></script>


</html>
