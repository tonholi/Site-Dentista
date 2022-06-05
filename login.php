<?php

include ('config.php');
//session_start();
//if (@$_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='index.php';</script>";


if (@$_REQUEST['botao']=="entrar")
{
	$login = $_POST['login'];
	$senha = md5($_POST['senha']);

	
	$query = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["email"]; 
		$_SESSION["UsuarioNivel"] = $coluna["nivel"];

		// caso queira direcionar para páginas diferentes
		$niv = $coluna['nivel'];
		if($niv == "USER"){ 
			header("Location: index_logado.php"); 
			exit; 
		}
		
		if($niv == "ADM"){ 
			header("Location: index_adm_logado.php"); 
			exit; 
		}
		
	}
	
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
                <a href="./index.php"> Voltar ao inicio </a>                
            </nav>
            </a></label>
        </div>
    </header>

    <main class="principal">
        <div class="container">
            <h1 class="title">Login</h1>
            <form action="" class="form" method=post>
                <input class="input" type="text" placeholder="Usuário" name="login">
                <span class="input-border"></span>
                <input class="input" type="password" placeholder="Senha" name="senha">
                <span class="input-border"></span>
                <button type=submit class="submit" name=botao value=entrar>Login</button>
                <button type=cadastro class="submit" name=botao value=cadastro> <a href="cadastro_usuario.php"> Cadastrar-se</button>
                <br>
            </form>
        </div>
    </main>

    
</body>