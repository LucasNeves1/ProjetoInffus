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
    <link href="styles/styleRegistrar.css" rel="stylesheet">
    <title>REGISTRAR USUÁRIO</title>
</head>

<body>
    <h1 class="text-center">REGISTRO DE NOVO USUÁRIO</h1>

    <?php

    // Inserindo dados no BD

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['registrar'])) {

        $empty_input = false;

        $dados = array_map('trim', $dados);
        if (in_array("", $dados)) {
            $empty_input = true;
            echo "<p class='text-center' style='color:red;'>Erro: Necessário preencher todos campos!</p>";
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            echo "<p class='text-center' style='color:red;'>Erro: Necessário preencher com e-mail válido!</p>";
        }
        if (!$empty_input) {
            $query_qnt_registros = "SELECT COUNT(id) AS num_result FROM users";
            $result_qnt_registros = $conn->prepare($query_qnt_registros);
            $result_qnt_registros->execute();
            $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);
            $query_user = "INSERT INTO users (nome, email, senha, observacoes) VALUES ('" . $dados['nome'] . "',
            '" . $dados['email'] . "',
            MD5('" . $dados['senha'] . "'),
            '" . $dados['observacoes'] . "')";
            $cad_user = $conn->prepare($query_user);
            $cad_user->execute();
            if ($cad_user->rowCount()) {
                echo "<p class='text-center' style='color:green;'> Usuário: <strong>" . $dados['nome'] . "</strong><br>E-mail: <strong>" . $dados['email'] . "</strong><br>Cadastrado com sucesso!</p>";
            } else {
                echo "<p class='text-center'>Erro ao cadastrar usuário!<br></p>";
            }
        }
    }

    ?>
    <div class="text-center formulario">
        <form name="cadUser" method="POST">
            <input type="text" name="nome" class="inputTeste" id="nome" required placeholder="Nome">
            <br>
            <input type="text" name="email" class="inputTeste" id="email" required placeholder="Email">
            <br>
            <input type="password" name="senha" class="inputTeste" id="senha" required placeholder="Senha">
            <br>
            <input type="password" name="confirm_senha" class="inputTeste" id="confirm_senha" required placeholder="Confirme a senha">
            <br>
            <input type="textarea" name="observacoes" class="inputTeste" id="observacoes" placeholder="Observações">
            <br><br>
            <input type="submit" name="registrar" class="btn btn-success" id="registrar" value="REGISTRAR" onClick="validarSenha()">

        </form>
        <br>
        <div class="text-center"><a href="index.php"><button class="btn btn-primary">VOLTAR</button></a></div><br>
    </div>

    <!-- Script para validar se senha = confirmacao senha -->

    <script>
        var password = document.getElementById("senha"),
            confirm_password = document.getElementById("confirm_senha");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("As senhas precisam ser iguais");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

</body>

</html>