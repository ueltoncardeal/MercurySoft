<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

require_once("conecta.php");
	
	if($conexao)
	{
		$evento = $_SESSION["EVENTO"];
		$id_evento = $_SESSION["ID_EVENTO"];

//FALTANDO A PARTE DE QUANDO UM LOGADO SEGUE O EVENTO
		// PROBLEMA QUANDO LOGADO: ESTA GRAVANDO NO BANCO DE DADOS O MESMO NOME DE EVENTO
		if(isset($_POST['inputEmail'])){ 
		$email = $_POST['inputEmail'];

		$sql = "SELECT * FROM TBL_SEGUIDOR WHERE EVENTO = '$evento' AND ID_EVENTO = $id_evento AND SEG_EMAIL = '$email';";

		$Res = mysqli_query($conexao, $sql);

		// calcula quantos dados retornaram
		$total = mysqli_num_rows($Res);

		if($total > 0){
			?>	<script> 
					alert("O email digitado já estava seguindo o evento.") ;
				</script>
				<script>
					window.close();
				</script> <?php

		}else {

		$sql = "INSERT INTO TBL_SEGUIDOR (SEG_EMAIL, EVENTO, ID_EVENTO)VALUES"
				."('$email', '$evento', '$id_evento')";

		$Res = mysqli_query($conexao, $sql);

		if (!$Res) {
			 $erro = mysqli_error($conexao);			
			?>	<script> 
					alert("Erro ao seguir evento: <?php echo $erro ?>") ;
				</script>
				<script>
					window.close();
				</script> <?php
				}
		}						
	}

	else{

		$email = $_SESSION["email"];
		$id_user = $_SESSION["id"];


		$sql = "INSERT INTO TBL_SEGUIDOR (SEG_EMAIL, EVENTO, ID_EVENTO, USER)VALUES"
				."('$email', '$evento', '$id_evento', '$id_user')";


		$Res = mysqli_query($conexao, $sql);


		if (!$Res) {
			 $erro = mysqli_error($conexao);			
			?>	<script> 
					alert("Erro ao seguir evento: <?php echo $erro ?>") ;
				</script>
				<script>
					window.close();
				</script> <?php
		}						
	}
	mysqli_close($conexao);
	unset($_SESSION["EVENTO"]);
	


	}


?>

<script> 
	alert("Pronto. Você receberá informações desse evento por E-mail.") ;
</script>

<script>
	
	window.opener.location.reload();
	window.close();
</script>

<script language= "JavaScript">

</script>

 </body>
</html>