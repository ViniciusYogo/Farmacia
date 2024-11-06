<?php
require 'config.php';

$sql = $pdo->prepare('DELETE FROM medicamento WHERE id = :id');

$sql->bindValue(':id' , $_GET['id']);

$sql->execute();
header("Location: visualizar.php");
?> 