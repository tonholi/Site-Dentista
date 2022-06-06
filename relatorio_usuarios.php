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
                <a href="cadastro_materiais.php"> Cadastrar Materiais </a>
                <a href="relatorio_usuarios.php"> usuários </a>
            </nav>
            <nav>
                <a href="./index_adm_logado.php"> Voltar ao inicio </a>                
            </nav>
            </a></label>
        </div>
    </header>

    <main class="principal">
        <div class="container">
            <h1 class="title">Usuarios</h1>
            <form action="relatorio_usuarios.php?botao=gravar" method="POST">
            <table width="95%" border="1" align="center">
  <tr>
    <td width="20%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome"  /></td>
    <td width="17%" align="right">Tipo:</td>
   <!-- <td width="18%"><select  name="tipo" required>
                    <option value = ""> Selecione o tipo do item</option>  
                    <option value = "todos">Todos</option>
                        <?php
                           // $resultDB = "SELECT * FROM categoria";
                            //$resultDB = mysqli_query($con, $resultDB);
                            //while($row_categoria = mysqli_fetch_assoc($resultDB)) {
                            //    echo "<option value = '".$row_categoria['id']."'>".$row_categoria['nomes']."</option>";
                           // }
                        ?>                     </select></td>-->
    <td width="21%"><input type="submit" name="botao" value="Gerar"/></td>
  </tr>
</table>
</form>

    <?php if (@$_REQUEST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">ID</th>
    <th width="30%">nome</th>
    <th width="15%">E-mail</th>
    <th width="12%">CPF</th>
  </tr>

<?php


$nome = $_POST['nome'];
@$tipo = $_POST['tipo'];

$query = "SELECT * FROM usuario;";

$result = mysqli_query($con, $query);


/*	
	echo "<pre>";
	echo $query;
	echo mysql_error();
	echo "</pre>";
*/
	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    <tr>
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
      <th width="15%"><?php echo $coluna['email']; ?></th>
      <th width="12%"><?php echo $coluna['cpf']; ?></th>
        <td>
        <a 
            href="editar_cadastro.php?id=<?php echo $coluna['id']; ?>"
            >editar</a>
        </td>
    </tr>

    
    <?php
	} // fim while
?>
</table>
<?php	
}
?>

</div>
    </main>

</body>    
