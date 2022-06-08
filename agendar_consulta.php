<?php
include('config.php');
include('verifica.php');

if (@$_REQUEST['botao']=="cadastrar")
{
    $id = $_SESSION['id_usuario'];
	$data = $_POST['data'];
    $horario = $_POST['horario'];
    $especialidade= $_POST['especialidade'];



	$query = "INSERT INTO agendamentos (data, hora, id_usuario, id_especialidade) VALUES ('$data', '$horario', $id, '$especialidade')";
	$result = mysqli_query($con, $query);
	
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
                <a href="./index_logado.php"> Voltar ao inicio </a>                
            </nav>
            </a></label>
        </div>
    </header>

    <main class="principal">
        <div class="container">
            <h1 class="title">Consultas</h1>
            <form action="agendar_consulta.php" class="form" method=post>
                <input class="input" type="date" placeholder="data consulta" name="data">
                <span class="input-border"></span>
                <input class="input" type="time" placeholder="Horário" name="horario">
                <span class="input-border"></span>
                  <select class="input" name="especialidade" required>
                    <option value = ""> Selecione a especialidade</option>  
                    <?php
                            $resultDB = "SELECT * FROM especialidade";
                            $resultDB = mysqli_query($con, $resultDB);
                            while($row_categoria = mysqli_fetch_assoc($resultDB)) {
                                echo "<option value = '".$row_categoria['id']."'>".$row_categoria['especialidade']."</option>";
                            }
                        ?>
                    </select>
                <span class="input-border"></span>
                <button type=submit class="submit" name="botao" value="cadastrar">Cadastrar</button>
                <br>
            </form>
        </div>
    </main>

    
</body>