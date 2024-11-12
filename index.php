<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://img.myloview.com.br/quadros/farmacia-icone-700-11593425.jpg" type="image/png">
    <title>Document</title>
</head>

<body>
    <div class="login">
        <h1>Tela de login</h1>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="inputEmail">
                <br>
                <div id="emailHelp" class="form-text">Nós nunca iremos divulgar seu email</div>
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" name="inputSenha">
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>
</body>
</html>

<?php
//No banco o emai é vinicius@gmail.com e a senha é 123

$email = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : '';;
$senha = isset($_POST['inputSenha']) ? $_POST['inputSenha'] : '';;

$sql = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE email = :email AND senha = :senha");
$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $senha);
if ($senha != '' and $email != '') {
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_NUM);
    if ($row[0] > 0) {
        header('Location: menu.php');
    }
}


?>