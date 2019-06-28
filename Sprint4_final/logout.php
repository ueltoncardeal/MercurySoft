<?php 
	//INICIALIZA SESSAO
	session_start();

	//DESTROI AS VARIAVEIS
	unset($_SESSION[id]);
	unset($_SESSION[nome]);
	unset($_SESSION[evento]);

	//REDIRECIONA PARA A TELA DE LOGIN
	header("location: index.php");
 ?>