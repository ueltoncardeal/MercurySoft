//Função para colocar mascara para o telefone
jQuery(document).ready(function($){
	var phone = function (val) {
		return val.replace(/\D/g, '').length < 10 ? '(00)0000-0000' : '(00)00000-0000';
		},
	Options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(phone.apply({}, arguments), options);
		}
	};

	$('.telefone_mask').mask(phone, Options);
				
});


// Função para colocar a mascara para CPF ou CNPJ
jQuery(document).ready(function($){
	var CpfCnpj = function (val) {
		return val.replace(/\D/g, '').length < 12 ? '000.000.000-000' : '00.000.000/0000-00';
		},
	Options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(CpfCnpj.apply({}, arguments), options);
		}
	};

	$('.cpf_cnpj').mask(CpfCnpj, Options);
				
});

// Função para colocar a mascara para CPF ou CNPJ
jQuery(document).ready(function($){
	var DataHora = function (val) {
		return val.replace(/\D/g, '').length = 4 ? '00:00' : '0:00';
		},
	Options = {
		onKeyPress: function(val, e, field, options) {
			field.mask(DataHora.apply({}, arguments), options);
		}
	};

	$('.data_hora').mask(DataHora, Options);
				
});

// Função para configurar o DatePicker
jQuery(document).ready(function(){
	$('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        language:"pt-BR",

		})
});


$(document).ready(function(){
  	
  	  var i = $('.cadastroProva').length + 1;//pega a quantidade de clones; 
      var elm_html = $('#clone-form').html();   //faz uma cópia dos elementos a serem clonados.
      var remover = document.getElementById('remove');
      

      $(document).on('click', '.clonador', function(e){
          e.preventDefault();
          remover.style.display="inline-block"; 

          var elementos = elm_html.replace(/\[[1\]]\]/g, '['+i+++']');  //substitui o valor dos index e incrementa++
          
          $('#clone-form').append(elementos);  //exibe o clone.
      });
      $('.remover').on('click', function(e) {
        e.preventDefault();
        $('#clone-form').remove();
        })

  
  });

