<?php 
	//VERIFICA SE A SESSAO ESTA ATIVA
	require_once("verifica.php");	
 ?>

<?php 

require_once("conecta.php");

	$codigo = $_GET["codigo"];
	
	$sql = "UPDATE TBL_EVENTO SET EVE_STATUS = 'APROVADO' WHERE ID_EVENTO = $codigo;";

	$Res = mysqli_query($conexao, $sql);

		if (!$Res) {
			 $erro = mysqli_error($conexao);
			echo "<p align = 'center'> Erro ao aprovar evento: $erro </p>";
			header("Refresh: 0; analisa.php");
		}				
		
	
	mysqli_close($conexao);

	echo "<script> alert('Evento aprovado com sucesso!'); </script>" ;		
		header("Refresh: 0; analisa.php");

 ?>