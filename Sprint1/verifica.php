<?php 
	//INICIALIZA A SESSAO
	session_start();

	//SE NAO TIVER VARIAVEIS REGISTRADAS
	// RETORNA PARA A TELA DE LOGIN
	if((!isset($_SESSION["id"])) AND (!isset($_SESSION["nome"])))
		header("Location: index.php");

 ?>