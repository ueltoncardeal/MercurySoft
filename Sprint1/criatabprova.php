<?php 
	$dbname = "bd_correcomigo";
	$db = mysqli_connect("localhost","root","root1234");
	$tbNome = "prova";
	$elimina = "DROP TABLE $tbNome";
	$criacao = "CREATE TABLE $tbNome ("
				."ID_PROVA SMALLINT NOT NULL AUTO_INCREMENT,"
				."PRO_DISTANCIA FLOAT NOT NULL,"
				."PRO_KIT VARCHAR(100),"
				."PRO_VALOR FLOAT NOT NULL,"
				."PRO_CATEGORIA VARCHAR(20) NOT NULL,"
				."PRO_FOTOPERCURSO BLOB",
				."PRO_PREMIACAO TEXT",
				."EVENTO VARCHAR(80) NOT NULL",
				."CONSTRAINT PK_PROVA PRIMARY KEY (ID_PROVA));"
				."CONSTRAINT FK_EVENTO FOREIGN KEY (EVENTO) REFERENCES EVENTO(ID_EVENTO) ON DELETE CASDADE";

	$indice = "CREATE UNIQUE INDEX IDX_PROVA ON $tbNome(ID_PROVA)";

	$resDrop = mysqli_db_query($dbname, $elimina);
	$resCria = mysqli_db_query($dbname, $criacao);
	$resIndx = mysqli_db_query($dbname, $indice);

	if ($resDrop > 0){
		echo "Table $tbNome eliminada.<br>";
	}else{
		echo "Table $tbNome não existe.<br>";
	}

	if ($resCria > 0){
		echo "Table $tbNome criada com sucesso.<br>";
	}else{
		echo "Table $tbNome não pode ser criada.<br>";
	}

	if($resIndx > 0){
		echo "Indice para Table $tbNome criado.<br>";
	}else{
		echo "Indice para table $tbNome não pode ser criado.<br>";
	}

	mysql_close();

 ?>