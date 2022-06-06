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
            <h1 class="title">Consultas</h1>
            <form action="cadastro_usuario.php" class="form" method=post>
                <input class="input" type="Text" placeholder="data consulta" name="data">
                <span class="input-border"></span>
                <input class="input" type="text" placeholder="Horário" name="horario">
                <span class="input-border"></span>
                <input class="input" type="text" placeholder="Especialidade" name="especialidade">
                <span class="input-border"></span>
                <button type=submit class="submit" name="botao" value="cadastrar">Cadastrar</button>
                <br>
            </form>
        </div>
    </main>

    
</body>