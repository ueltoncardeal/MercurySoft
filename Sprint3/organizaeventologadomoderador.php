<?php 
	//VERIFICA SE A SESSAO ESTA ATIVA
	require_once("verifica.php");
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Corre Comigo</title>
	<!-- CARREGA ARQUIVOS JAVASCRIPT E CSS -->
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
		<form method="POST" action="organizaevento.php">
			<div class="form-row">									  
			    <div class="form-group col col-xs-6 col-md-5">
			      <label for="inputNomeEvento">Nome do evento</label>
			      <input type="text" class="form-control" id="inputNomeEvento" name="inputNomeEvento" placeholder="Nome do Evento" required>
			    </div>

			    <div class="form-group col col-xs-4 col-md-2">
			      <label for="datepicker">Data do evento</label>
			      <input class="form-control" data-date-format="dd/mm/yyyy" id="datepicker" name="datepicker" placeholder="Selecione" required>	 	         
			    </div>

			    <div class="form-group col col-xs-4 col-md-1">
			      <label for="inputHoraEvento">Horário</label>
			      <input type="text" class="form-control data_hora" id="inputHoraEvento" name="inputHoraEvento" placeholder="__:__">
			    </div>
			    
			    <div class="form-group col col-xs-6 col-md-4">
			      <label for="inputImagemEvento">Carregar imagem</label>
			      	<div class="input-group mb-3">					
					  	<div class="custom-file">
					    	<input type="file" class="custom-file-input" id="inputImagemEvento" name="inputImagemEvento" accept="image/*">
					    	<label class="custom-file-label" for="inputImagemEvento">Selecione a imagem</label>
					  	</div>
					</div>
			    </div>
			</div>			

			<div class="form-row">	
				<div class="form-group col col-xs-6">
				    <label for="inputLocal">Local</label>
				    <input type="text" class="form-control" id="inputLocal" name="inputLocal" placeholder="Local" required>
				</div>
				<div class="form-group col col-xs-6">
				    <label for="inputCidade">Cidade</label>
				    <input type="text" class="form-control" id="inputCidade" name="inputCidade" placeholder="Cidade" required>
				</div>
			</div>

			<div class="form-row">
			  	<div class="form-group col col-xs-12 col-md-8">
			    	<label for="inputEndereco">Endereço</label>
			    	<input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Endereço" required>
			 	</div>
			
			    <div class="form-group col col-xs-4 col-md-1">
			      <label for="inputNumero">Número</label>
			      <input type="text" class="form-control" id="inputNumero" name="inputNumero">
			    </div>
			    <div class="form-group col col-xs-4 col-md-1">
			      	<label for="inputEstado">Estado</label>
			      	<select id="inputEstado" name="inputEstado" class="form-control" required>
			        	<option></option>
			        	<option>AC</option>
						<option>AL</option>
						<option>AM</option>
						<option>AP</option>
						<option>BA</option>
						<option>CE</option>
						<option>DF</option>
						<option>ES</option>
						<option>GO</option>
						<option>MA</option>
						<option>MG</option>
						<option>MS</option>
						<option>MT</option>
						<option>PA</option>
						<option>PB</option>
						<option>PE</option>
						<option>PI</option>
						<option>PR</option>
						<option>RJ</option>
						<option>RN</option>
						<option>RO</option>
						<option>RR</option>
						<option>RS</option>
						<option>SC</option>
						<option>SE</option>
						<option>SP</option>
						<option>TO</option>
			      	</select>
			    </div>
			</div>

			<div class="form-row">
			    <div class="form-group col col-xs-4 col-md-2">
			      	<label for="inputNProvas">Número de provas</label>
			      	<input type="text" class="form-control" id="inputNProvas" name="inputNProvas">
			    </div>
			    <div class="form-group col">
				    <label for="inputLocal">Link do resultado</label>
				    <input type="text" class="form-control" id="inputResultado" name="inputResultado" placeholder="Link do resultado" required>
				</div>
			</div>
			   
			   <!-- ******************************************************************************
			   
			   		Posteriormente precisamos ajustar para clonar o
			   		formulário de provas apenas para o campo de input  -->

			   <!--<div class="form-group col-md-2">
			      <label for="inputQtdeProvas">Quantidade de Provas</label>
			      <input type="text" class="form-control" id="inputQtdeProvas" name="inputQtdeProvas">
			    </div>
			  </div>

			  *************************************************************************************-->

			<div class="form-row">
				<div id="clone-form" class="cadastroProva">
				<h3>Prova [1]</h3>
				
				    <div class="form-row">	
				  	<div class="form-group col">

				    <label for="Distancia[1]">Distancia Km</label>
			    	<input type="text" class="form-control" id="Distancia[1]" name="Distancia[1]" placeholder="Distancia em km" required>
			    </div>
			    <div class="form-group col">
			    	<label for="Kitprova[1]">Kit da prova</label>
			    	<input type="text" class="form-control" id="Kitprova[1]" name="Kitprova[1]" placeholder="Kit da prova">
			    </div>
			    <div class="form-group col">
			    	<label for="Valor[1]">Valor R$</label>
			    	<input type="text" class="form-control" id="Valor[1]" name="Valor[1]" placeholder="R$" required>
			    </div>
			    <div class="form-group col">
			    	<label for="Categoria[1]">Categoria</label>
			    	<input type="text" class="form-control" id="Categoria[1]" name="Categoria[1]" placeholder="Categoria">
			    </div>
			</div><div class="form-row">	
				  <div class="form-group col">

			    	<label for="Premiacao[1]">Premiação</label>
			    	<input type="text" class="form-control" id="Premiacao[1]" name="Premiacao[1]" placeholder="Premiação da prova">
			    </div>

			    <!-- PRECISA VER COMO CARREGAR IMAGEM -->
			    <div class="form-group col">
			    	<label for="Percurso[1]">Anexar foto do percurso</label>
			    	<div class="input-group mb-3">					
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="Percurso[1]" name="Percurso[1]" accept="image/*">
					    <label class="custom-file-label" for="Percurso[1]">Selecione a imagem</label>
					  </div>
					</div>
			    </div>
			</div>
			    	</div>
			   </div>
							    				    				   			
			<button type="button" class="clonador btn btn-primary">+ Adicionar Prova</button>
			<!--<button type="button" class="remover btn btn-danger" id="remove">- Remover prova</button>-->
			<br>
			<br>
			<br>
			  
			  <button type="submit" class="btn btn-primary" name="enviar" id="enviar" >Enviar</button>
			</form>


		
	</div>
</div>




</body>



</html>