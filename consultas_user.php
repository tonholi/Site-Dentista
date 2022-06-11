<?php 
    include ('config.php');
    include('verifica.php');



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
                <a href="./index.php"> Home </a>
                <a href="./consultas_user.php"> Minhas consultas </a>
            </nav>
            <label>
            <a class="agendar" href="logout.php">Sair
            </a>
            <a class="agendar" href="agendar_consulta.php">agendar consulta
            </a>

            </label>
        </div>
    </header>

    <main>
        <section>
            <div class="container1">
                <table class="tabela">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $id_usuario = $_SESSION["id_usuario"];
                                @$data = $_POST['data'];
                                //@$serie = $_POST['serie'];
                                //@$descricao = $_POST['descricao'];
                                //@$qtd = $_POST['qtd'];

                                $query = "SELECT * FROM agendamentos WHERE id_usuario = $id_usuario";
                                //$query .= ($data ? " AND material LIKE '%$data%' " : "");
                                //$query .= ($serie ? " AND serie LIKE '%$serie%' " : "");
                                //$query .= ($descricao ? " AND descricao LIKE '%$descricao%' " : "");
                                //$query .= ($qtd ? " AND qtd LIKE '%$qtd%' " : "");
                                //$query .= " ORDER by id";
                                $result = mysqli_query($con, $query);

                                while ($coluna = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $coluna['data']; ?></td>
                                        <td><?php echo $coluna['hora']; ?></td>
                                        <td><?php $usuario = $coluna['id_usuario'];
                                            if ($usuario) {
                                                $queryif = "SELECT nome, imagem FROM usuario where id = $usuario";
                                                $resultif = mysqli_query($con, $queryif);
                                                $resultdb = mysqli_fetch_assoc($resultif);
                                                echo $resultdb['nome'];
                                                echo ' ';
                                                echo '<img src=' . $resultdb["imagem"] . ' alt=""  style="max-width: 17px;">' ;
                                                
                                            } ?></td>
                                        <td><?php $status = $coluna['status'];
                                            if ($status) {
                                                $queryif = "SELECT status FROM status where id = $status";
                                                $resultif = mysqli_query($con, $queryif);
                                                $resultdb = mysqli_fetch_assoc($resultif);
                                                echo $resultdb['status'];
                                            } ?></td>
                                        
                                    </tr>
                                <?php
                                } // fim while
                                ?>
                            </tbody>
                        </table>
            </div>
        </section>

    </main>

</body>

</html>