<?php 
	//CONECTA COM O BANCO DE DADOS
	require_once("conecta.php");

	//RECEBE OS DADOS DO FORMULARIO
	$user = "root";
	$password = "root1234";

	//VERIFICA
	$sql = mysqli_query($conexao,"
		SELECT ID_USER, NAME_USER FROM tb_user 
		WHERE USER = '$user' AND PASSWORD = '$password'
		") or die ("ERRO NO COMANDO SQL.");

	//LINHAS AFETADAS PELA CONSULTA
	$row = mysqli_num_rows($sql);

	//VERIFICA SE RETORNOU ALGO
	if ($row == 0){
		echo "Usuário ou senha inválidos.";
	}else
	{
		//PEGA OS DADOS
		$dados = mysqli_fetch_array($sql);
		$id = $dados["ID_USER"];
		$nome = $dados["NAME_USER"];
		//$id = mysqli_result($sql,0 , "ID_USER");
		//$nome = mysqli_result($sql,$row , "NAME_USER");
	

	//INICIALIZA A SESSAO
	session_start();

	//GRAVA AS VARIAVEIS NA SESSAO
	$_SESSION[id] = $id;
	$_SESSION[nome] = $nome;

	//REDIRECIONA PARA A PAG QUE VAI EXIBIR OS PRODUTOS
	header("location: index.php");
	}
 ?>