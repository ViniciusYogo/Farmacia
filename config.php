<?php   
try{
    $pdo= new PDO("mysql:dbname=farmacia;host=localhost:3306","root","12345678");
}
catch (Exception $e){
    echo("Erro");
}
?>