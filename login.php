<?php

require('config.php');

session_start();

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit();
}
elseif(isset($_SESSION['connected'])) {
	header('Location: index.php');
	exit();
}

elseif(isset($_POST['username']) && isset($_POST['password'])) {
	if($_POST['username'] == $username && $_POST['password'] == $password) {
		$_SESSION['connected'] = 1;
		header('Location: index.php');
		exit();
	}
	else {
		header('Location: login.php?erreur=mauvais');
		exit();
	}
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<title>Iptables Web UI | Connexion</title>
</head>
<body style="margin-top: 200px; margin-left: 270px; margin-right: 270px;">
	<div class="well" align="center">
		<h4>Connexion</h4>
		<br>
		<?php if(isset($_GET['erreur'])) echo '<div class="alert alert-danger">Mot de passe ou nom d\'utilisateur incorrect ! <a class="close" data-dismiss="alert" href="#">&times;</a></div>' ?>	
		<form action="" method="POST">
		<input type="text" name="username" placeholder="Nom d'utilisateur" />
		<br>
		<input type="password" name="password" placeholder="Mot de passe" />
		<br>
		<br>
		<button type="submit" class="btn btn-primary"><i class="icon-white icon-user"></i> Se connecter</button>
		</form>
	</div>
<?php include('includes/footer.php'); ?>