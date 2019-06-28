<?php 
	//VERIFICA SE A SESSAO ESTA ATIVA
	require_once("verifica.php");	
 ?>

<?php 
	require_once("conecta.php");
		
	$pesquisar = $_POST['pesquisar'];

	$sql1 = "SELECT * FROM TBL_EVENTO WHERE EVE_NOME LIKE '%$pesquisar' AND SYSDATE() < EVE_DATA  AND EVE_STATUS = 'APROVADO' ORDER BY EVE_DATA;";

	$res = mysqli_query($conexao, $sql1);

	// transforma os dados em um array
	$linha = mysqli_fetch_array($res);

	// calcula quantos dados retornaram
	$total = mysqli_num_rows($res);					
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
		<!-- CRIAR VARIAVEL COM O NUMERO TOTAL DE PROXIMOS EVENTOS E CLONAR A MESMA QUANTIDADE DE CONTAINER PARA TODOS  -->
		<div class="row">	
			<!--
				$sql0 = "SELECT E.EVE_NOME, E.EVE_DATA, E.EVE_CIDADE FROM TBL_EVENTO E WHERE SYSDATE() < E.EVE_DATA;"

				$sql1 = "SELECT COUNT(*)  FROM TBL_EVENTO WHERE SYSDATE() < EVE_DATA;"
		-->
<?php
	if ($total > 0){

	do{

?>

	<div id="clone-cont" class="proximoseventos">
		<div class="col col-xs-3">
			<div class="container-bg">
				<div class="container">
					<table border="1">
						<tr>
							<tr><div id="titleevent"><?=$linha['EVE_NOME']?><br></div></tr>
							<tr><?=date("d/m/Y", strtotime($linha['EVE_DATA']))?><br></tr>
							<tr><?=$linha['EVE_CIDADE']?><br></tr>
							<tr><a href="descricaoeventologado.php?codigo=<?php echo $linha["ID_EVENTO"]; ?>">Ver</a></tr>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>	

			<?php
        // finaliza o loop que vai mostrar os dados
        }while($linha = mysqli_fetch_assoc($res));
    // fim do if 
    }
?>		

	  </div>
	</div>
</div>

		


</body>



</html>