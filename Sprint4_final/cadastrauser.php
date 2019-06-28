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
		$nomeuser = $_POST['inputNomeUser'];
		$cpfcnpj = $_POST['inputCPFCNPJ'];
		$emailuser = $_POST['inputEmailUser'];
		$passworduser = $_POST['inputUserPassword'];
		$telefoneuser = $_POST['inputTelefoneUser'];
		
		$sql = "INSERT INTO TBL_USER (USER_NOME, USER_CPFCNPJ, USER_EMAIL, USER_PASSWORD, USER_TELEFONE)VALUES"

				."('$nomeuser', '$cpfcnpj', '$emailuser', '$password', '$telefoneuser')";

		$Res = mysqli_query($conexao, $sql);

		if (!$Res) {
			 $erro = mysqli_error($conexao);
			echo "<p align = 'center'> Erro ao inserir evento: $erro </p>";
		}				
		
	}
	mysqli_close($conexao);
}

?>

<script> 
alert("Usuário cadastrado com sucesso") ;
</script>
 
<?PHP
header("Refresh: 0; login.html");
?>	

 </body>
</html>