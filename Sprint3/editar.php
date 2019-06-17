<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

require_once("conecta.php");

	$codigo = $_GET["codigo"];
	
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
		$inputResultado = $_POST['inputResultado'];
		$id_user = $_SESSION["id"];

		$sql = "UPDATE TBL_EVENTO SET EVE_NOME = '$nomeEvento', EVE_DATA = STR_TO_DATE('$datepicker', '%d/%m/%Y'), EVE_HORAINICIO = '$inputHoraEvento',EVE_LOCAL = '$inputLocal',EVE_ENDERECO = '$inputEndereco', EVE_NUMERO_ENDERECO = '$inputNumero', EVE_CIDADE = '$inputCidade', EVE_ESTADO = '$inputEstado',EVE_NPROVAS = '$inputQtdeProvas', EVE_RESULTADO = '$inputResultado' WHERE ID_EVENTO = $codigo;";

		$Res = mysqli_query($conexao, $sql);

		if (!$Res) {
			 $erro = mysqli_error($conexao);
			echo "<p align = 'center'> Erro ao editar evento: $erro </p>";
		}
		
		/*$distancia = array(); 
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
		}*/

	}

}
?>

	<script>
	alert("Evento alterado com sucesso") ;
	</script>
  
<?PHP
	$sql1 = "SELECT ID_USER FROM TBL_USER WHERE USER_MODERADOR = 'S';";

	$res = mysqli_query($conexao, $sql1);

	// transforma os dados em um array
	$linha = mysqli_fetch_assoc($res);

	$id = $_SESSION["id"];
	$idmod = $linha['ID_USER'];
		if ($id <> $idmod) {
			mysqli_close($conexao);
			header("Refresh: 0; meuseventos.php");
		}
		else{
			mysqli_close($conexao);
			header("Refresh: 0; meuseventosmoderador.php");}
?>

 </body>
</html>