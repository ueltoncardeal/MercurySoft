<?php 
	//DADOS PARA CONEXAO
	$servidor = "localhost";
	$bd = "db_correcomigo";
	$user = "root";
	$password = "root1234";
	$conexao = mysqli_connect($servidor, $user, $password)
			or die("ERRO NA CONEXAO!");

	//SELECIONA O DB  A SER UTILIZADO
	$database = mysqli_select_db($conexao,$bd)
			or die("ERRO NA SELECAO DO DATABASE!");

	session_start();
 ?>