<?php
require 'config.php';

$id = $_GET['id'];
$sql = $pdo->prepare('SELECT * FROM medicamento WHERE id = :id');
$sql->bindValue(':id', $id);
$sql->execute();

$medicamento = $sql->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.myloview.com.br/quadros/farmacia-icone-700-11593425.jpg" type="image/png">
    <link rel="stylesheet" href="comprar.css">
    <title>Farmacia</title>
</head>

<body>
    <h1>Comprar <?= htmlspecialchars($medicamento['nome_Medicamento']); ?></h1>
    <div>
        <div class="informacoes">
            <img src="<?php echo $medicamento['imagem_Remedio']; ?>" class="card-img-top">

            <form action="processar_compra.php" method="post">
                <div class="info-compra">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($medicamento['id']); ?>">
                    <h2>
                        <p>Preço:R$ <?= htmlspecialchars($medicamento['preco']); ?></p>
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" class="input"  name="inputQuantidade" min="1" max="<?= htmlspecialchars($medicamento['quantidade_Disponivel']); ?>" required>
                    </h2>
                </div>
        </div>
        <button type="submit">
            <span class="transition"></span>
            <span class="gradient"></span>
            <span class="label">Comprar</span>
        </button>
        </form>
    </div>
</body>

</html>