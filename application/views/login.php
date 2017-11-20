<?php $this->load->view('include/header')  ?>
	
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="box box-widget widget-user-2" >
				<div class="widget-user-header bg-light-blue">
					<h3 style="margin-left: 0px" class="widget-user-username text-center">Login</h3>
				</div>
				<div class="login-box-body">
					<form action="<?= base_url('login/entrar')  ?>" method="post">
						<div class="form-group has-feedback">
							<input type="email" name="email" class="form-control" placeholder="Email">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" name="senha" class="form-control" placeholder="Senha">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<?php if(! empty($error) ) : ?>
		                    <div class="alert alert-danger text-center" style="">
          						Usuário ou senha inválidos!
          					</div>
		            	<?php endif; ?>
						<div class="row">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat">
									Entrar
								</button>
							</div>
						</div>
					</form>
					<br>
					<a href="<?= base_url('cadastro') ?>" class="text-center">Cadastrar</a>
					<br>
					<br>
					<fb:login-button scope="public_profile,email" onlogin="checkLoginState(); ">
					</fb:login-button>
					
					
					<div id="status">
					</div>
				</div>
			</div>
			
		</div>
		<div class="imagemBackgroun">
		</div>
		
	</body>
</html>
