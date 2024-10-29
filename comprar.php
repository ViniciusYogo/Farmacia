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
    <title>Document</title>
</head>

<body>
    <h1>Comprar <?= htmlspecialchars($medicamento['nome_Medicamento']); ?></h1>
    <div>
        <img src="<?php echo $medicamento['imagem_Remedio']; ?>" class="card-img-top">
        <p>Preço:R$ <?= htmlspecialchars($medicamento['preco']); ?></p>

        <form action="processar_compra.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($medicamento['id']); ?>">
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="inputQuantidade"  min="1" max="<?= htmlspecialchars($medicamento['quantidade_Disponivel']); ?>" required>
            <button type="submit">Comprar</button>
        </form>
    </div>
</body>
</html>

