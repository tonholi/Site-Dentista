<?php
include ('config.php');



if (@$_REQUEST['botao']=="cadastrar")
{


	$senha = md5($_POST['senha']);
    $nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
    $email = $_POST['email'];
    verifyCPF($cpf);
    $uploaddir = 'img/';
    $uploadfile = $uploaddir . basename($_FILES['arquivo']['name']);
    move_uploaded_file($_FILES['arquivo']['tmp_name'],$uploadfile);

	$query = "INSERT INTO usuario (nome, senha, email, cpf, nivel, imagem) VALUES ('$nome', '$senha', '$email', '$cpf', 'USER', '$uploadfile')";
	$result = mysqli_query($con, $query);
    header("Location: login.php"); 
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/SUBMARCA 2 SEM FUNDO.png" type="image/x-icon">
    <title>Dra. Karen Mayumi</title>
</head>

<body class="bg">
    <header>
        <div id="topo">
            <img class="logo" src="./img/logo.png" alt="Logo Dra. Karen">
            <nav>
                <a href="./index_adm_logado.php"> Voltar ao inicio </a>                
            </nav>
            </a></label>
        </div>
    </header>

    <main class="principal">
        <div class="container">
            <h1 class="title">Usuários</h1>
            <form enctype="multipart/form-data" action="cadastro_usuario.php" class="form" method=post>
                <input class="input" type="Text" placeholder="Nome" name="nome">
                <span class="input-border"></span>
                <input class="input" type="text" placeholder="e-mail" name="email">
                <span class="input-border"></span>
                <input class="input" type="password" placeholder="Senha" name="senha">
                <span class="input-border"></span>
                <input class="input" type="text" placeholder="CPF" name="cpf">
                <span class="input-border"></span>
                <input class="input" type="file" placeholder="arquivo" name="arquivo">
                <span class="input-border"></span>
                <button type=submit class="submit" name="botao" value="cadastrar">Cadastrar</button>
                <br>

            </form>
        </div>
    </main>

    
</body>