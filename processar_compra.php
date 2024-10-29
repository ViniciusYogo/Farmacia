<?php
require 'config.php';

$id=$_POST['id'];
$quantidade=$_POST['inputQuantidade'];

$quantidadeSql= $pdo->prepare('SELECT quantidade_Disponivel from medicamento where id = :id');
$quantidadeSql->bindValue(':id' , $id);
$quantidadeSql->execute();

$result = $quantidadeSql->fetch(PDO::FETCH_ASSOC);

$quantidadeAtual = $result['quantidade_Disponivel'];
$novoValor=$quantidadeAtual - $quantidade;



if($novoValor >=0){
    $sql = $pdo->prepare("UPDATE medicamento SET quantidade_Disponivel = :novoValor WHERE id = :id");
    $sql->bindValue(':id' , $id);
    $sql->bindValue(':novoValor',$novoValor);
    $sql->execute();
    echo "Quantidade atualizada com sucesso.";
    header("Location: menu.php");
    exit();
}

?>
