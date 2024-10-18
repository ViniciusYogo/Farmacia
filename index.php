<?php
require'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tela de login</h1>
    <form action="index.php" method="post">
        <label>Usuário</label>
        <input type="email" placeholder="Email" name="inputEmail">    
        <br>
        <label>Senha</label>
        <input type="text" placeholder="Senha" name="inputSenha">    
        <br>
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>

<?php
    //No banco o emai é vinicius@gmail.com e a senha é 123
    $email=$_POST['inputEmail'];
    $senha=$_POST['inputSenha']; 

    $sql = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE email = :email AND senha = :senha");
    $sql->bindValue(':email',$email);
    $sql->bindValue(':senha',$senha);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_NUM);
    if ($row[0] > 0) {
        header('Location: menu.php');
    }

    
?>