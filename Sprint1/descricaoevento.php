<!DOCTYPE html>
<html>
<head>
	<title>descricao evento</title>
</head>
<body>
	<a href="descricaoevento.php?ordem = eve_nome">Evento</a>


<?php 
	require_once("conecta.php");
		if (isset($_GET['ordem'])) {
			$ordem = $_GET['ordem'];
		}else
		{
			$sql1= "select eve_nome,PRO_DISTANCIA,PRO_VALOR from tbl_evento, tbl_prova";
			$res = mysqli_query($conexao, $sql1);
			while ($registro = mysqli_fetch_row($res)) {
				$evento = $registro[0];
				$distancia = $registro[1];
				$valor = number_format($registro[2],2,",",",");
				echo "<td width='50%'>";
				echo "<p align='center'>$evento</td>";
				echo "<td width='25%'>$distancia</td>";
				echo "<td width='25%'>R\$$valor</td>";
			}
		}
 ?>
</body>
</html>