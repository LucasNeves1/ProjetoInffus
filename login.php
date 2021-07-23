<?php

include "./conexao.php";
if (isset($_POST['logar'])) {
    $email = $_POST['email'];
    $senha = MD5($_POST['senha']);
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql->execute([$email]);
    if ($sql->rowCount() == 1) {
        $info = $sql->fetch();
        if ($senha == $info['senha']) {
            $_SESSION['id'] = $info['id']; //recuperando id, nome e email.
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['email'] = $info['email'];
            header("Location: indexLogado.php");  //indo para página privada.
            die();
        } else {

            $_SESSION['erro'] = '<div class="text-center" style="color:red";><p><i class="fas fa-exclamation-circle"></i> Usuário ou senha incorretos!</p></div>';
            header("Location: logar.php");
        }
    } else {
        $_SESSION['erro2'] = '<div class="text-center" style="color:red";><p><i class="fas fa-exclamation-circle"></i> Usuário não encontrado.</p></div>';
        header("Location: logar.php");
    }
}
