<?php 
	require_once("conecta.php");
			
			$codigo = $_GET["codigo"];

			$sql1= "SELECT E.EVE_NOME, E.EVE_DATA, E.EVE_HORAINICIO, E.EVE_LOCAL, E.EVE_ENDERECO, E.EVE_CIDADE, E.EVE_ESTADO, P.PRO_DISTANCIA, P.PRO_KIT, P.PRO_VALOR, P.PRO_CATEGORIA, P.PRO_PREMIACAO, E.EVE_IMAGEM, P.PRO_FOTOPERCURSO, E.ID_EVENTO  
				FROM TBL_EVENTO E, TBL_PROVA P
				WHERE E.ID_EVENTO = $codigo AND E.EVE_NOME = P.EVENTO;";
			$res = mysqli_query($conexao, $sql1);
			
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
  <p><a href="logout.php">Sair</a></p>
</nav>

<div class="jumbotron" id="jumbotronPrincipal" style="background-color: #d7dbd2"> 
	
	<div class="container">
			
		<?php
	$row = mysqli_fetch_array($res);							
	$id_evento = $row[14];
	$evento = $row[0];
	?>

	<h1><?php printf ("%s", $row[0]);?></h1>
	<p><?php printf ("%s <br \n>", $row[12]);?> </p>	
	<p><?php printf ("%s <br \n>", $row[3]); 
							printf (date("d/m/Y", strtotime($row[1])))?></p>

	<h2>PROVAS</h2>
				<?php
					$cont = 1;
					if ($total > 0){

					do{

				?>
				 
	<p>Prova <?php printf("%s", $cont);?></p>			 
	<p><?php printf ("Distancia: %s Km  Premiação: %s <br \n>", $row[7], $row[11]);?> </p>	
	<p><?php printf ("Categoria: %s Kit: %s <br \n>", $row[10], $row[8]);?> </p>	
	<p><?php printf ("Valor: R$%s <br \n>", $row[9]);?> </p>
	<p><?php printf ("%s <br \n>", $row[13]);?> </p>	
							

	  
		<?php
				        $cont = $cont + 1;
				        // finaliza o loop que vai mostrar os dados
				        }while($row = mysqli_fetch_array($res));
				    // fim do if 
				    }
				?>
	<?php
		$email = $_SESSION["email"];
		$id_user = $_SESSION["id"];

		$sql1= "SELECT EVENTO, SEG_EMAIL
					FROM TBL_SEGUIDOR
					WHERE ID_EVENTO = $id_evento AND SEG_EMAIL = '$email' AND USER = $id_user AND EVENTO = '$evento'";

	
		
		$res = mysqli_query($conexao, $sql1);

		// calcula quantos dados retornaram
		$total = mysqli_num_rows($res);		
		

		if($total > 0){ ?>
			<div>
				<a class="btn btn-primary" disable>Seguindo evento</a>
			</div>
	<?php  
		}else{ 

			$_SESSION["ID_EVENTO"] = $id_evento;
			$_SESSION["EVENTO"] = $evento;			

			?>
			<div>
				<a class="btn btn-primary" href="javascript:void(0)" onclick="window.open('cadastroemail.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESIZABLE=NO, SCROLLBARS=NO, MENUBAR=NO, TOP=90%, LEFT=280%, WIDTH=485, HEIGHT=545');">Seguir</a>
			</div>
	<?php 
		}

	?>
</div>
	

		

</body>



</html>