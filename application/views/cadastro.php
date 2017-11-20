<?php $this->load->view('include/header')  ?>
	
<body class="hold-transition register-page">
			<div class="register-box">
				<div class="box box-widget widget-user-2" >
					<div class="widget-user-header bg-light-blue">
						<h3 style="margin-left: 0px" class="widget-user-username text-center">Cadastre-se</h3>
					</div>
					
					<div class="register-box-body">
						
						<form action="<?= base_url('usuario/salvar') ?>" onsubmit="return validar_cadastro()" method="post">
							<div class="form-group has-feedback">
								<label class="label-perfil">* Nome:</label>
								<input type="text" id="nome" name="nome" class="form-control input-perfil" placeholder="Ex: Carlos Drummond">
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label class="label-perfil">* Email:</label>
								<input type="email" id="email" name="email" class="form-control input-perfil" placeholder="Ex: jose@email.com">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label class="label-perfil">* Senha:</label>
								<input type="password" name="senha" id="senha" class="form-control input-perfil" placeholder="******">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label class="label-perfil">* Confirmar senha:</label>
								<input type="password" id="confirmar_senha" class="form-control input-perfil" placeholder="******">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
							<div class="row">
								<div class="col-xs-12" id="form_footer">
									<button type="submit" class="btn btn-primary btn-block btn-flat">
										Cadastrar
									</button>
								</div>
								<input type="hidden" name="nome-img" id="nome-img"/>
								<tbody id="body-quantidade">
									<tr class="text-center"></tr>
								</tbody>
							</div>
						</form>
						<br>
						<a href="<?= base_url('login') ?>" class="text-center">Já tem uma conta? Faça login aqui!</a>
					</div>
				</div>
			</div>
			<div class="imagemBackgroun">
		</div>
</body>

</html>