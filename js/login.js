$(document).ready(function (){
	
	$('#email').click(
	function (){
		if($(this).val()=="name@example.com"){
			$(this).val('');
		}//fim do if
		
	}//fim funcao anonima
 );//fim clck no objeto de id=email
 
    $('#senha').click(
	function(){
		if($(this).val()=="senha"){
			$(this).val('');
		}//fim do if
	}//fim da funçao anonima
);//fim do click no objeto de id= senha

$('.verSenha').click(
	function(){
		let entrada = document.querySelector('#senha');
		if(entrada.getAttribute('type') == 'password') {
			entrada.setAttribute('type', 'text');
		} else {
			entrada.setAttribute ('type', 'password');
		}
	});

 $('#botaoLogar').click(
    function(){
		if($('#email').val()=='' || $('#email').val()=="name@example.com"){
			$('#mensagem').html("Email invalido");
			$('#mensagem').fadeIn( 300 ).delay( 2000 ).fadeOut( 400 );
			
		} else if ($('#senha').val()=='' || $('#senha').val()=="senha") {		
			$('#mensagem').html("Senha invalida");
			$('#mensagem').fadeIn( 300 ).delay( 2000 ).fadeOut( 400 );
			
		} else{
		//alert("dados recebidos");

    	//$.get("conexao.php", function(retornaConexao){
   		//console.log(retornaConexao);
		//});
		
		let dados;
		dados={
			email:$('#email').val(),senha:$('#senha').val()
		};
		$.post("pesquisaUsuario.php",dados,function (retornaUsuario){
			if(retornaUsuario==""){
				$('#mensagem').html("Usuário não encontrado");
				$('#mensagem').fadeIn( 300 ).delay( 2000 ).fadeOut ( 400 );
				
		
		}else{
			//$('#mensagem').html("Usuario encontrado");
			//$('#mensagem').fadeIn( 300 ).delay( 2000 ).fadeOut( 400 );
			window.location.replace("principal.php?id="+retornaUsuario);
		}
		});//fim do click no objeto de id=botaoLogar
		
		}//fim do else
			
	});//fi
	
	
	});	