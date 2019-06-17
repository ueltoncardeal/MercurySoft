<?php 
	require_once("conecta.php");
		
		{
			$sql1= "SELECT ID_EVENTO, EVE_NOME, EVE_DATA, EVE_CIDADE, EVE_STATUS FROM TBL_EVENTO WHERE SYSDATE() < EVE_DATA AND EVE_STATUS = 'PENDENTE' ORDER BY EVE_DATA;";
			$res = mysqli_query($conexao, $sql1);
			$total = -1;
			if ($res){
			// transforma os dados em um array
			$linha = mysqli_fetch_assoc($res);

			// calcula quantos dados retornaram
			$total = mysqli_num_rows($res);

		}
			

		}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Corre Comigo</title>
	<!-- CARREGA ARQUIVOS JAVASCRIPT E CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

<!-- Primeira barra de navegação -->
	<nav id="navbar1" class="navbar navbar-expand-lg navbar-light bg-light">
  		<!-- logo da empresa -->
		<a class="navbar-brand" href="#">
	  		<img src="" width="50" height="50" alt="">
	  	</a>

	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="	#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	 	</button>

	  	<div id="cont_head" class="container justify-content-center">
		 
		  <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Pesquise por evento ou cidade" aria-label="Search" size="50px">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
		  </form>
	  	</div>
	  	<p><?php echo "Olá, ".$_SESSION["nome"];?></p>

	</nav>

</head>


<body>
<!-- segunda barra de navegação -->
<nav id="navbar2" class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container justify-content-center" id="cont_nav">
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="logadomoderador.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="proximoseventoslogadomoderador.php">Próximos Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resultadoslogadomoderador.php">Resultados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="organizaeventologadomoderador.php">Organizar Evento</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="meuseventosmoderador.php">Meus eventos</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="analisa.php">Analisar Evento</a>
      </li>
    </ul>
  </div>
  </div>
  <p><a href="logout.php">Sair</a><p>
</nav>


<div class="jumbotron" id="jumbotronPrincipal" style="background-color: #d7dbd2"> 
	<div class="container">
		
		<div class="row">
<?php
if ($total > 0){
?>
			<table border="1">
				<tr>
					<td>Evento</td>
					<td>Data</td>
					<td>Cidade</td>
					<td>Status</td>
					<td>Descrição</td>
					<td>Ações</td>
					
				</tr>

<?php
	
		do{

?>


							
						 <tr>
						 <td><?=$linha['EVE_NOME']?><br></td>
						<td><?=date("d/m/Y", strtotime($linha['EVE_DATA'])) ?><br></td>
						<td><?=$linha['EVE_CIDADE']?><br></td>
						<td><?=$linha['EVE_STATUS']?><br></td>
						<td><center><a href="analisadescricaoevento.php?codigo=<?php echo $linha["ID_EVENTO"]; ?>">Ver</a></center></td>
						<td><a href="aprova.php?codigo=<?php echo $linha['ID_EVENTO'];?>">Aprovar</a> <a href="rejeita.php?codigo=<?php echo $linha['ID_EVENTO'];?>">Rejeitar</a></td>
											    
						 </tr>
							
						 
<?php
	// finaliza o loop que vai mostrar os dados
	}while($linha = mysqli_fetch_assoc($res));
// fim do if 
}else {
?>	
	<h2>Nenhum evento para analisar no momento.</h2>

<?php 
}
 ?>
				
			</table>

					

		

	  	</div>

	</div>
</div>

		


</body>



</html>