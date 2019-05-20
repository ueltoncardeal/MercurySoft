<?php 
	//VERIFICA SE A SESSAO ESTA ATIVA
	require_once("verifica.php");
	echo "<h2>Autenticação do Usuário</h2>";
	echo "Usuário logado no sistema: ".$_SESSION["nome"];
 ?>

 <h2 align="center">Menu de administração da Loja</h2><hr>
 <p align="left"><a href="incluir.php"><b>Incluir Produto</b></a></p>
 <p align="left"><a href="alterar.php"><b>Alterar Produto</b></a></p>
 <p align="left"><a href="excluir.php"><b>Excluir Produto</b></a></p>
 <p align="left"><a href="listar.php"><b>Listar Produtos</b></a></p>

 <?php 
 	echo "<br><br><a href='logout.php'>Logout</a>";
  ?>
