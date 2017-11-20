function validar_cadastro(){
	var retorno = true;
	var campo;
	
	$('.has-error').removeClass('has-error');
	$('.btn-perfil').attr('style','width: 100%;overflow: hidden;text-overflow: ellipsis;');
	
	campo = $('#nome-img');
	if(campo.val() == ''){
		$('#img-control').addClass('form-group has-error');
		retorno = false;
	}
	campo = $('#nome');
	if(campo.val() == ''){
		campo.parent().addClass('has-error');
		retorno = false;
	}
	campo = $('#email');
	if(campo.val() == ''){
		campo.parent().addClass('has-error');
		retorno = false;
	}
	campo = $('#profissao');
	if(campo.val() == ''){
		campo.parent().addClass('has-error');
		retorno = false;
	}
	campo = $('#interesse');
	if(campo.val() == null){
		campo.parent().parent().addClass('has-error');
		$('.btn-perfil').attr('style','border-bottom: solid 1px #dd4b39;width: 100%;overflow: hidden;text-overflow: ellipsis;');
		retorno = false;
	}
	campo = $('#senha');
	if(campo.val() == ''){
		campo.parent().addClass('has-error');
		retorno = false;
	}else if(campo.val() != $('#confirmar_senha').val()){
		campo.parent().addClass('has-error');
		$('#confirmar_senha').parent().addClass('has-error');
		retorno = false;
	}
	
	return retorno;
}

function validar_publicacao(){
	var retorno = true;
	var campo;
	console.log()
	$('.has-error').removeClass('has-error-pub');
	
	campo = $('#titulo');
	if(campo.val() == ''){
		campo.parent().addClass('has-error-pub');
		retorno = false;
	}
	campo = $('#descricao');
	if(campo.val() == ''){
		campo.parent().addClass('has-error-pub');
		retorno = false;
	}
	
	return retorno;
}

