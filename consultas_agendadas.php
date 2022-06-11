<?php

include('config.php');

$btn_acao = ['Confirmar' => 2, 'Cancelar' => 3];

if (@$_REQUEST['botao'] == "Confirmar" || @$_REQUEST['botao'] == "Cancelar") {

    $acao = $btn_acao[$_REQUEST['botao']];

    $query = "UPDATE agendamentos SET 
        		    status = '$acao'
        	    	WHERE id = '{$_REQUEST['id']}'";
    $result_update = mysqli_query($con, $query);

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
                <a href="consultas_agendadas.php ">Consultas Agendadas </a>
                <a href="materiais_disponiveis.php"> materiais disponíveis </a>
                <a href="relatorio_usuarios.php"> usuários </a>
            </nav>
            <label><a class="agendar" href="logout.php">Sair
            </a></label>
        </div>
    </header>
</body>

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
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                @$data = $_POST['data'];
                                //@$serie = $_POST['serie'];
                                //@$descricao = $_POST['descricao'];
                                //@$qtd = $_POST['qtd'];

                                $query = "SELECT * FROM agendamentos WHERE id > 0";
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
                                        <td style="text-align: center!important; align-items: center;">
                                        <input type="submit" value="Confirmar" class="btn-aprovar" name="botao">
                                        <input type="submit" value="Cancelar" class="btn-cancelar" name="botao">
                                        </td>
                                        </td>
                                    </tr>
                                <?php
                                } // fim while
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </section>

    </main>

</html>