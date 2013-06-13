<?php
require('config.php');

session_start();

if(!isset($_SESSION['connected'])) {
	header('Location: login.php');
	exit();
}

if(isset($_POST['block'])) {
	ssh2_exec($connection, 'sudo iptables -F INPUT');
	ssh2_exec($connection, 'sudo iptables -A INPUT -i lo -j ACCEPT');
	ssh2_exec($connection, 'sudo iptables -A INPUT -m multiport -p tcp --dport www,ssh,smtp -j ACCEPT');
	ssh2_exec($connection, 'sudo iptables -A INPUT -j LOG -m limit');
	ssh2_exec($connection, 'sudo iptables -A INPUT -j REJECT');
	header('Location: bloquertrafic.php?action=success');
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
	<h4>Bloquer le trafic extérieur</h4>
	<br>
	<?php if($_GET['action'] == 'success') {
	echo '<div class="alert alert-success">Le trafic extérieur à bien été bloqué sauf pour le serveur web, ssh et smtp ! <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	else {
	echo '<div class="alert alert-danger">Le trafic extérieur sera bloqué, sauf pour le serveur web, ssh et smtp. <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	?>
	<br>
	<form action="" method="POST">
		<input type="hidden" name="block" />
		<button value="block" class="btn btn-primary btn-large" type="submit">Bloquer le trafic extérieur</button>
	</form>
	</div>
<?php include('includes/footer.php'); ?>