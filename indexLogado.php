<?php

include './conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/styleIndexLogado.css" rel="stylesheet">

    <title>HOME</title>
</head>

<body class="text-center">
    <?php

    echo "Seja bem vindo ao sistema, <h3 style='font-weight:bold'>" . $_SESSION['nome'] . "</h3>";

    ?>

    <div class="bgDados">
        <p style="font-size:24px;">Seus dados:</p><br>
        <?php
        echo "E-mail: " . $_SESSION['email'] . "<br>";
        echo "Seu ID: " . $_SESSION['id'] . "<br>";
        ?>

        <br><a href="index.php"><button class="btn btn-danger">SAIR</button></a>
    </div>
</body>

</html>