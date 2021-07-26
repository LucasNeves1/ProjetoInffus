<?php

include_once './conexao.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/styleLogar.css" rel="stylesheet">
    <title>LOGIN USUÁRIO</title>
</head>

<body class="text-center">
    <h1>LOGIN</h1>

    <p class="text-center text-danger">

        <?php if (isset($_SESSION['erro'])) {
            echo $_SESSION['erro'];
            unset($_SESSION['erro']);
        }
        if (isset($_SESSION['erro2'])) {
            echo $_SESSION['erro2'];
            unset($_SESSION['erro2']);
        } ?>

    </p>
    <div class="formulario">
        <form name="logar" method="POST" action="login.php">

            <input type="text" name="email" id="nome" placeholder="E-mail" class="inputCss"><br>

            <input type="password" name="senha" id="senha" placeholder="Senha" class="inputCss"><br>

            <br><input type="submit" name="logar" id="logar" value="LOGIN" class="btn btn-success">

        </form>
        <br><a href="index.php"><button class="btn btn-primary">VOLTAR</button></a>
    </div>


</body>

</html>