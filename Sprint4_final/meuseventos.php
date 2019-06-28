<?php 
	//VERIFICA SE A SESSAO ESTA ATIVA
	require_once("verifica.php");	
 ?>

<?php 
	
	require_once("conecta.php");		

			$id = $_SESSION["id"];

			//reprova evento que passou da data automaticamente
			$sql0 = "SELECT ID_EVENTO, EVE_DATA, EVE_STATUS FROM TBL_EVENTO WHERE ID_USER = $id;";
			$consulta = mysqli_query($conexao, $sql0);

			if ($consulta){
				$linha = mysqli_fetch_assoc($consulta);

				$data = date('Y-m-d');

				do {			
					
					if ($linha['EVE_DATA'] < $data AND $linha['EVE_STATUS'] == 'PENDENTE') {
				
						$id_evento = $linha['ID_EVENTO'];
						$sql = "UPDATE TBL_EVENTO SET EVE_STATUS = 'REJEITADO' WHERE ID_EVENTO = $id_evento;";

						$reprova = mysqli_query($conexao, $sql);
					}			
				} while($linha = mysqli_fetch_assoc($consulta));

			}
			//---------------------------------------------------------
			

			$sql1= "SELECT ID_EVENTO, EVE_NOME, EVE_DATA, EVE_CIDADE, EVE_STATUS FROM TBL_EVENTO WHERE ID_USER = $id ORDER BY EVE_DATA;";
			$res = mysqli_query($conexao, $sql1);	

			$total = -1;
			if ($res){
			// transforma os dados em um array
			$linha = mysqli_fetch_assoc($res);

			// calcula quantos dados retornaram
			$total = mysqli_num_rows($res);
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
		 
		  <form class="form-inline my-2 my-lg-0" method="POST" action="pesquisarorganizador.php">
		      <input class="form-control mr-sm-2" type="search" placeholder="Pesquise por evento" aria-label="Search" size="50px" name="pesquisar">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="enviar">Pesquisar</button>
		  </form>
		  
	  	</div>
	  	<?php echo "Olá, ".$_SESSION["nome"];?>

	</nav>

</head>


<body>
<!-- segunda barra de navegação -->
<nav id="navbar2" class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container justify-content-center" id="cont_nav">
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="logado.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="proximoseventoslogado.php">Próximos Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resultadoslogado.php">Resultados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="organizaeventologado.php">Organizar Evento</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="meuseventos.php">Meus Eventos</a>
      </li>
    </ul>
  </div>
  </div>
  <p><a href="logout.php">Sair</a><p>
</nav>

<div class="jumbotron" id="jumbotronPrincipal" style="background-color: #d7dbd2"> 
	
	<div class="container">

<?php
if ($total > 0){
	?>

			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Evento</th>
			      <th scope="col">Data</th>
			      <th scope="col">Cidade</th>
			      <th scope="col">Status</th>
			      <th scope="col">Ações</th>
			    </tr>
			  </thead>

		<?php
	
		do{

?>

				<tbody>
							
						 <tr>
						 <td><?=$linha['EVE_NOME']?><br></td>
						<td><?=date("d/m/Y", strtotime($linha['EVE_DATA'])) ?><br></td>
						<td><?=$linha['EVE_CIDADE']?><br></td>
						<td><?=$linha['EVE_STATUS']?><br></td>
						<td><a href="descricaoeventologado.php?codigo=<?php echo $linha["ID_EVENTO"]; ?>">Ver</a>
							<?php if ($linha['EVE_STATUS'] == 'PENDENTE'){ ?>
							<a href="editarevento.php?codigo=<?php echo $linha['ID_EVENTO']; ?>">Editar</a></td>
						<?php }  ?>
							
							
											    
						 </tr>
						</tbody>
							
						 
<?php
	// finaliza o loop que vai mostrar os dados
	}while($linha = mysqli_fetch_assoc($res));
// fim do if 
}else {
?>	
	<h2>Nenhum evento foi criado por você ainda.</h2>

<?php 
}
 ?>
		</table>
	</div>
</div>

		

</body>



</html>