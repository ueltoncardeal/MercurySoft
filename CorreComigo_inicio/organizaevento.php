
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Corre Comigo</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css" >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/form_evento.css">
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
        <a class="nav-link" href="calendario.html">Próximos Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Resultados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Organizar Evento</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<!--
?php 
	require_once("conecta.php");
	if(!isset($_POST["enviar"]))
{ //PRECISA FECHAR 
 ?
-->

<div class="jumbotron" id="jumbotronPrincipal" style="background-color: #d7dbd2"> 	
	<div class="container">	
		
		<!-- CRIAR FORMULARIO PARA CADASTRAR UM NOVO EVENTO
			O BOTAO ENVIAR SERÁ O RESPONSÁVEL PARA CONECTAR NO BD-->
			<form method="POST" action="organizaevento.php">
				<div class="form-row">						
			  
			    <div class="form-group col" id="coluna1">
			      <label for="inputNomeEvento">Nome do evento</label>
			      <input type="text" class="form-control" id="inputNomeEvento" placeholder="Nome do Evento">
			    </div>

			    <div class="form-group col">
			      <label for="datepicker">Data do Evento</label>
			      <input class="form-control" data-date-format="dd/mm/yyyy" id="datepicker" name="datepicker" placeholder="Selecione uma data">							         
			    </div>


			    <div class="form-group col">
			      <label for="inputHoraEvento">Horário</label>
			      <input type="text" class="form-control" id="inputHoraEvento" placeholder="__:__">
			    </div>

			    <div class="form-group col">
			      <label for="inputImagemEvento">Carregar imagem</label>
			      <input type="text" class="form-control" size=100px id="inputImagemEvento" placeholder="Carregar imagem">
			    </div>

			  </div>


			  <div class="form-row">	
				  <div class="form-group col">
				    <label for="inputLocal">Local</label>
				    <input type="text" class="form-control" id="inputLocal" placeholder="Local">
				  </div>
				  <div class="form-group col">
				    <label for="inputCidade">Cidade</label>
				    <input type="text" class="form-control" id="inputCidade" placeholder="Cidade">
				  </div>
				</div>

			<div class="form-row">
			  <div class="form-group col">
			    <label for="inputEndereco">Endereço</label>
			    <input type="text" class="form-control" id="inputEndereco" placeholder="Endereço">
			  </div>
			
			    <div class="form-group col">
			      <label for="inputNumero">Número</label>
			      <input type="text" class="form-control" id="inputNumero">
			    </div>
			    <div class="form-group col-md-4">
			      <label for="inputState">Estado</label>
			      <select id="inputState" class="form-control">
			        <option selected>Selecione</option>
			        <option>...</option>
			      </select>
			    </div>
			</div>

			<div class="form-row">
			    
			    <div class="form-group col-md-2">
			      <label for="inputQtdeProvas">Quantidade de Provas</label>
			      <input type="text" class="form-control" id="inputQtdeProvas">
			    </div>
			  </div>
			
			  <button type="submit" class="btn btn-primary">Sign in</button>
			</form>
		
	</div>
</div>


		

</body>



</html>