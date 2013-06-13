<?php
require('config.php');

session_start();

if(!isset($_SESSION['connected'])) {
	header('Location: login.php');
	exit();
}

if(isset($_POST['autoriser'])) {
	ssh2_exec($connection, 'iptables -A INPUT -s '.$_POST['ip'].' -j ACCEPT');
	header('Location: autoriserip.php?action=success');
	exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<title>Iptables Web UI | Accueil</title>
</head>
<body style="margin-top: 100px; margin-left: 270px; margin-right: 270px;">
	<div class="well" align="center">
	<h4>Autoriser une adresse IP</h4>
	<br>
	<?php if($_GET['action'] == 'success') {
	echo '<div class="alert alert-success">L\'adresse IP a bien été autorisée ! <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	else {
	echo '<div class="alert alert-danger">L\'adresse IP sera autorisée. <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	?>
	<br>
	<form action="" method="POST">
		<input type="text" name="autoriser" placeholder="IP à autoriser" />
		<button class="btn btn-primary btn-large" type="submit">Autoriser l'adresse IP</button>
	</form>
	</div>
<?php include('includes/footer.php'); ?>