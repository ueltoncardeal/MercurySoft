<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	
require_once("conecta.php");
	
	if(isset($_POST['enviar']))
	{ 
	
	if($conexao)
	{
		$nomeEvento = $_POST['inputNomeEvento'];
		$datepicker = $_POST['datepicker'];
		$inputHoraEvento = $_POST['inputHoraEvento'];
		$inputImagemEvento = $_POST['inputImagemEvento'];
		$inputLocal = $_POST['inputLocal'];
		$inputCidade = $_POST['inputCidade'];
		$inputEndereco = $_POST['inputEndereco'];
		$inputNumero = $_POST['inputNumero'];
		$inputEstado = $_POST['inputEstado'];
		$inputQtdeProvas = $_POST['inputNProvas'];

		$sql = "INSERT INTO TBL_EVENTO (EVE_NOME, EVE_DATA, EVE_HORAINICIO,EVE_LOCAL,EVE_ENDERECO, EVE_NUMERO_ENDERECO, EVE_CIDADE, EVE_ESTADO,EVE_NPROVAS)VALUES"

				."('$nomeEvento', STR_TO_DATE('$datepicker', '%d/%m/%Y'), '$inputHoraEvento', '$inputLocal', '$inputEndereco', '$inputNumero', '$inputCidade', '$inputEstado', '$inputQtdeProvas')";

		$Res = mysqli_query($conexao, $sql);

		if (!$Res) {
			 $erro = mysqli_error($conexao);
			echo "<p align = 'center'> Erro ao inserir evento: $erro </p>";
		}
		
		$distancia = array(); 
		$kitprova = array();
		$valor = array();
		$categoria = array();
		$premiacao = array();
		$fotopercurso = array();

		for ($i = 1; $i <= $inputQtdeProvas; $i++){
			$distancia[$i] = $_POST['Distancia'][$i];
			$kitprova[$i] = $_POST['Kitprova'][$i];
			$valor[$i] = $_POST['Valor'][$i];
			$categoria[$i] = $_POST['Categoria'][$i];
			$premiacao[$i] = $_POST['Premiacao'][$i];
			$fotopercurso[$i] = $_POST['Percurso'][$i];


			$sql = "INSERT INTO TBL_PROVA (PRO_DISTANCIA, PRO_KIT, PRO_VALOR, PRO_CATEGORIA, PRO_FOTOPERCURSO, PRO_PREMIACAO, EVENTO)VALUES"

				."('$distancia[$i]', '$kitprova[$i]', '$valor[$i]', '$categoria[$i]',  '$fotopercurso[$i]','$premiacao[$i]', '$nomeEvento')";

			$Res = mysqli_query($conexao, $sql);

			if (!$Res) {
				 $erro = mysqli_error($conexao);
				echo "<p align = 'center'> Erro ao inserir prova: $erro </p>";
			}
		}

	}

	mysqli_close($conexao);
}

 ?>
 
<script>
alert("Evento cadastrado com sucesso") ;
</script>
 
 
<?PHP
header("Refresh: 0; index.php");
?>
 	<!--<p align="center"><a href="index.php">Voltar</a></p>-->

 </body>
</html>