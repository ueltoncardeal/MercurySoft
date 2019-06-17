<?php 
	//CONECTA COM O BANCO DE DADOS
	require_once("conecta.php");

	//RECEBE OS DADOS DO FORMULARIO
	$user = $_POST["txtUser"];
	$password = $_POST["txtPassword"];

	//VERIFICA
	$sql = mysqli_query($conexao,"
		SELECT ID_USER, USER_NOME, USER_MODERADOR FROM TBL_USER
		WHERE USER_EMAIL = '$user' AND USER_PASSWORD = '$password'
		") or die ("ERRO NO COMANDO SQL.");

	//LINHAS AFETADAS PELA CONSULTA
	$row = mysqli_num_rows($sql);

	//VERIFICA SE RETORNOU ALGO
	if ($row == 0){
		echo "<script> alert('Usuário ou senha inválidos'); </script>" ;		
		header("Refresh: 0; login.html");
	}else
	{
		//PEGA OS DADOS
		$dados = mysqli_fetch_array($sql);
		$id = $dados["ID_USER"];
		$nome = $dados["USER_NOME"];
		$moderador = $dados["USER_MODERADOR"];			

	//INICIALIZA A SESSAO
	if(!isset($_SESSION))
	{
	   session_start();
	}

	//GRAVA AS VARIAVEIS NA SESSAO
	$_SESSION[id] = $id;
	$_SESSION[nome] = $nome;

	
	//REDIRECIONA PARA A PAG INICIAL
	if($moderador == 'S'){
		header("location: logadomoderador.php");
	}else{
	header("location: logado.php");
	}
}
 ?>