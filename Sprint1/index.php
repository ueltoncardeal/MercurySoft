
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Corre Comigo</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
	<script src="js/jquery.mask.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

	<style type="text/css">
		#lblResultado{
			font-size: 15px;
		}

		#jumbotronPrincipal{
			padding-top: 30px;
		}

		#jumbotronResult{
			padding-top: 5px;
			height: 280px;
		}

		#navbar1{
			height: 50px;
		}

		#navbar2{
			height: 40px;
		}

	</style>

	<nav id="navbar1" class="navbar navbar-expand-lg navbar-light bg-light">
  
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
	  	<a class="btn " href="#">Entrar</a>
	  	 <a class="btn " href="#">Cadastrar</a>
	</nav>

</head>


<body>


<nav id="navbar2" class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="container justify-content-center" id="cont_nav">
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="descricaoevento.php">Próximos Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Resultados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="organizaevento.html">Organizar Evento</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<div class="jumbotron" id="jumbotronPrincipal" style="background-color: #d7dbd2"> 
	
	<div class="container">
		<div class="row">
			
			<div class="col-sm-6">
				<!-- slider de imagens -->
			      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="images/img1.png" class="d-block w-100" alt="...">
					       <div class="carousel-caption d-none d-md-block">
						    <h5 id="h5carousel">Titulo 1</h5>
						    <p id="pcarousel">Essa é a imagem 1</p>
						  </div>
					    </div>
					    <div class="carousel-item">
					      <img src="images/img2.png" class="d-block w-100" alt="...">
					      <div class="carousel-caption d-none d-md-block">
						    <h5 id="h5carousel">Titulo 2</h5>
						    <p id="pcarousel">Essa é a imagem 2</p>
						  </div>
					    </div>
					    <div class="carousel-item">
					      <img src="images/img3.png" class="d-block w-100" alt="...">
					      <div class="carousel-caption d-none d-md-block">
						    <h5 id="h5carousel">Titulo 3</h5>
						    <p id="pcarousel">Essa é a imagem 3</p>
						  </div>
					    </div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
		    </div>
		    		
			<div class="col-sm-6">

				<!-- Sessão com form para enviar para o backend -->
				<div class="jumbotron" id="jumbotronResult" style="background-color: #B6C8C0 "> 
					<div class="container">					
						<!--<h2 id="titleResult">Resultados</h2>						
						<a id="lblResultado" href="resultadoSaoCarlos.com.br" class="badge badge-info">27/04/2019 - Etapa 1: Corrida São Carlos</a>
						<br>
						<a id="lblResultado" href="resultadoRibeirao.com.br" class="badge badge-info">21/04/2019 - Corrida Ribeirão Preto</a>
						<br>
						<a id="lblResultado" href="resultadoSaoCarlos.com.br" class="badge badge-info">20/04/2019 - Etapa 2: Volta USP</a>
						<br>
						<a id="lblResultado" href="resultadoRibeirao.com.br" class="badge badge-info">13/04/2019 - Corrida das montanhas - Brotas</a>
						<br>
						<a id="lblResultado" href="resultadoSaoCarlos.com.br" class="badge badge-info">07/04/2019 - Corrida de rua Empresa</a>
						<br>
						<a id="lblResultado" href="resultadoRibeirao.com.br" class="badge badge-info">06/04/2019 - Corrida Piracicaba</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		

</body>



</html>