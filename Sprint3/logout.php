<?php 
	//INICIALIZA SESSAO
	session_start();

	//DESTROI AS VARIAVEIS
	unset($_SESSION[id]);
	unset($_SESSION[nome]);

	//REDIRECIONA PARA A TELA DE LOGIN
	header("location: index.php");
 ?>