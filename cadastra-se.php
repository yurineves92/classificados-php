<?php require 'pages/header.php'; ?>
<div class="container">
	<h2>Formulário de cadastro</h2>
	<?php
	require 'classes/usuarios.class.php';
	$u = new Usuarios();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);

		if(!empty($nome) && !empty($email) && !empty($senha)){
			if($u->cadastrar($nome,$email,$senha,$telefone)){
				?>
				<div class="alert alert-success"><strong>Sucesso!</strong> Usuário criado com sucesso! <a href="login.php" class="alert-link">Faça o login agora!</a></div>
				<?php	
			} else {
				?>
				<div class="alert alert-info">Este usuário já existe dentro da nossa base da dados! <a href="login.php" class="alert-link">Faça o login agora!</a></div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-danger">Preencha todos os campos!</div>
			<?php
		}
	}
	?>
	<form method="POST">
		<div class="form-group">
			<label for="Nome">Nome:</label>
			<input type="text" class="form-control" id="nome" name="nome"/>
		</div>
		<div class="form-group">
			<label for="Email">Email:</label>
			<input type="email" class="form-control" id="email" name="email"/>
		</div>
		<div class="form-group">
			<label for="Senha">Senha:</label>
			<input type="password" class="form-control" id="senha" name="senha"/>
		</div>
		<div class="form-group">
			<label for="Telefone">Telefone:</label>
			<input type="text" class="form-control" id="telefone" name="telefone"/>
		</div>
		<input type="submit" value="Enviar" class="btn btn-default">
	</form>
</div>
<?php require 'pages/footer.php'; ?>