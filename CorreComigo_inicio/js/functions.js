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

