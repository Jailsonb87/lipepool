$(document).ready(function(){
			$("#cpf").mask("000.000.000-00")
			$("#telefone").mask("(00) 0000-0000")
			$("#cep").mask("00.000-000")
                        $("#numero").mask("000000")
			
			
			$("#celular").mask("(00) 00000-0009")
			
			$("#celular").blur(function(event){
				if ($(this).val().length == 15){
					$("#celular").mask("(00) 00000-0009")
				}else{
					$("#celular").mask("(00) 00000-0009")
				}
			})
		})