<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Classificados</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">Classificados</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
				<li><a href="meus-anuncios.php">Meus anúncios</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['cLogin']['nome'] ?>
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<li><a href="sair.php">Sair</a></li>
					</ul>
				</li>
				<?php else: ?>
				<li><a href="cadastra-se.php">Cadastra-se</a></li>
				<li><a href="login.php">Login</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>