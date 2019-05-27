<?php 
	$dbname = "bd_correcomigo";
	$db = mysqli_connect("localhost","root","root1234");
	$tbNome = "tbl_evento";
	$elimina = "DROP TABLE $tbNome";
	$criacao = "CREATE TABLE $tbNome ("
				."ID_EVENTO SMALLINT NOT NULL AUTO_INCREMENT,"
				."EVE_NOME VARCHAR(80) NOT NULL,"
				."EVE_DATA DATE NOT NULL,"
				."EVE_HORAINICIO TIME NOT NULL,"
				."EVE_IMAGEM BLOB,"
				."EVE_LOCAL VARCHAR(100) NOT NULL,"
				."EVE_ENDERECO VARCHAR(100) NOT NULL,"
				."EVE_NUMERO_ENDERECO SMALLINT,"
				."EVE_CIDADE VARCHAR(100) NOT NULL,"
				."EVE_ESTADO VARCHAR(2) NOT NULL,"				
				."CONSTRAINT PK_EVENTO PRIMARY KEY (ID_EVENTO));";

	$indice = "CREATE UNIQUE INDEX idx_evento ON $tbNome(ID_EVENTO)";

	$resDrop = mysqli_db_query($dbname, $elimina);
	$resCria = mysqli_db_query($dbname, $criacao);
	$resIndx = mysqli_db_query($dbname, $indice);

	if($resDrop > 0 ) {
		echo "Table $tbNome eliminada.<br>";
	}else{
		echo "Table $tbNome não existe.<br>";
	}

	
	if($resCria > 0 ) {
		echo "Table $tbNome criada.<br>";
	}else{
		echo "Table $tbNome não pode ser criada.<br>";
	}


	if($resIndx > 0 ) {
		echo "Indice da Table $tbNome criado.<br>";
	}else{
		echo "Indice da Table $tbNome não pode ser criado.<br>";
	}	
	mysql_close();

 ?>