<?php 
	//VERIFICA SE A SESSAO ESTA ATIVA
	require_once("verifica.php");
	
 ?>
 <?php 

require_once("conecta.php");

	$codigo = $_GET["codigo"];
	
	$sql = "SELECT EVE_NOME, EVE_DATA, EVE_HORAINICIO,EVE_LOCAL,EVE_ENDERECO, EVE_NUMERO_ENDERECO, EVE_CIDADE, EVE_ESTADO,EVE_NPROVAS, EVE_RESULTADO FROM TBL_EVENTO WHERE ID_EVENTO = $codigo;";

	$res = mysqli_query($conexao, $sql);

	// transforma os dados em um array
			$linha = mysqli_fetch_array($res);

	

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
		
		<!-- CRIAR FORMULARIO PARA CADASTRAR UM NOVO EVENTO
			O BOTAO ENVIAR SERÁ O RESPONSÁVEL PARA CONECTAR NO BD-->
			<form method="POST" action="editar.php?codigo=<?php echo $codigo;?>">
				<div class="form-row">						
			  
			    <div class="form-group col col-xs-6 col-md-5">
			      <label for="inputNomeEvento">Nome do evento</label>
			      <input type="text" class="form-control" id="inputNomeEvento" name="inputNomeEvento" value="<?php echo $linha['EVE_NOME']; ?>" required>
			    </div>

			    <div class="form-group col col-xs-4 col-md-2">
			      <label for="datepicker">Data do evento</label>
			      <input class="form-control" data-date-format="dd/mm/yyyy" id="datepicker" name="datepicker" value="<?php echo date("d/m/Y", strtotime($linha['EVE_DATA'])); ?>" required>	 						         
			    </div>

			    <div class="form-group col col-xs-4 col-md-1">
			      <label for="inputHoraEvento">Horário</label>
			      <input type="text" class="form-control data_hora" id="inputHoraEvento" name="inputHoraEvento" value="<?php echo $linha['EVE_HORAINICIO']; ?>">
			    </div>
			    <!-- PRECISA VER COMO CARREGA IMAGEM
			    	Obs: Talvez precise ver a dimesão da imagem, pois será essa imagem que será utilizada na "caixinha" de proximos eventos e na descrição de evento -->
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
				    <input type="text" class="form-control" id="inputLocal" name="inputLocal" value="<?php echo $linha['EVE_LOCAL']; ?>" required>
				  </div>
				  <div class="form-group col col-xs-6">
				    <label for="inputCidade">Cidade</label>
				    <input type="text" class="form-control" id="inputCidade" name="inputCidade" value="<?php echo $linha['EVE_CIDADE']; ?>" required>
				  </div>
				</div>

			<div class="form-row">
			  <div class="form-group col col-xs-12 col-md-8">
			    <label for="inputEndereco">Endereço</label>
			    <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" value="<?php echo $linha['EVE_ENDERECO']; ?>" required>
			  </div>
			
			    <div class="form-group col col-xs-4 col-md-1">
			      <label for="inputNumero">Número</label>
			      <input type="text" class="form-control" id="inputNumero" name="inputNumero" value="<?php echo $linha['EVE_NUMERO_ENDERECO']; ?>">
			    </div>
			    <div class="form-group col col-xs-4 col-md-1">
			      <label for="inputEstado">Estado</label>
			      <select id="inputEstado" name="inputEstado" class="form-control" required>
			        <option selected><?php echo $linha['EVE_ESTADO'];?></option>
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
			      <input type="text" class="form-control" id="inputNProvas" name="inputNProvas" value="<?php echo $linha['EVE_NPROVAS']; ?>">
			    </div>
			    <div class="form-group col">
				    <label for="inputLocal">Link do resultado</label>
				    <input type="text" class="form-control" id="inputResultado" name="inputResultado" placeholder="Link do resultado" value="<?php echo $linha['EVE_RESULTADO'] ?>" required>
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

			  *************************************************************************************

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
			
			<br>
			<br>
			<br>-->
			  <div class="form-row"> 
			  <button type="submit" class="btn btn-primary" name="enviar" id="enviar" >Salvar</button></div>
			</form>


		
	</div>
</div>




</body>



</html>