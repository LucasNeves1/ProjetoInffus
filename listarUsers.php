<?php include_once './conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./styles/styleListarUsers.css" />
    <title>LISTAR TIMES</title>
</head>

<body class="text-center">
    <h1>LISTA DOS USUÁRIOS</h1>
    <?php

    $query_user = "SELECT id, nome, email FROM users";
    $result_user = $conn->prepare($query_user);
    $result_user->execute();

    if (($result_user) and ($result_user->rowCount() != 0)) {
        $row_user = $result_user->fetch(PDO::FETCH_ASSOC);
    }

    ?>
    <div class="resultados">
        <?php

        $query_users = "SELECT id, nome, email FROM users";
        $result_users = $conn->prepare($query_users);
        $result_users->execute();

        if (($result_users) and ($result_users->rowCount() != 0)) {
            while ($row_user = $result_users->fetch(PDO::FETCH_ASSOC)) {
                extract($row_user);

        ?>

                <div class="time">

                    <?php
                    echo "<p class='nomeUsers'>$nome </p><br>";
                    echo "ID: $id <br>";
                    echo "Email: $email<br>"; ?> </div>
        <?php
            }
        } else {
            echo "Ainda não existem usuários cadastrados!";
        }

        ?>
    </div>

    <a href="index.php"><button class="btn btn-primary">VOLTAR</button></a>
    <a href="registrar.php"><button class="btn btn-success">REGISTRAR NOVO USUÁRIO</button></a>
</body>

</html>