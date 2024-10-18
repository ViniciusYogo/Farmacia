<?php   
try{
    $pdo= new PDO("mysql:dbname=farmacia;host=localhost:3306","root","cimatec");
}
catch (Exception $e){
    echo("Erro");
}
?>