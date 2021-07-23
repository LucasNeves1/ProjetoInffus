<?php

include "./conexao.php";
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/styleIndex.css" rel="stylesheet">
    <title>TESTE INFFUS</title>
</head>

<body class="text-center">
    <h1 class="titulo">MENU INICIAL</h1>

    <a href="registrar.php"><button class="btn btn-success">REGISTRAR</button></a>
    <a href="logar.php"><button class="btn btn-primary">LOGIN</button></a><br><br>
    <a href="listarUsers.php"><button class="btn btn-info">LISTAR USUÁRIOS</button></a>
</body>

</html>