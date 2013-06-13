<?php
require('config.php');

session_start();

if(!isset($_SESSION['connected'])) {
	header('Location: login.php');
	exit();
}

if(isset($_POST['block'])) {
	ssh2_exec($connection, 'sudo iptables -A INPUT -p icmp -j DROP');
	header('Location: bloquericmp.php?action=success');
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
	<h4>Bloquer protocole ICMP</h4>
	<br>
	<?php if($_GET['action'] == 'success') {
	echo '<div class="alert alert-success">Le protocole ICMP a bien été bloqué ! <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	else {
	echo '<div class="alert alert-danger">Le protocole sert aux requètes de PING. Si vous bloquez ce protocole, les
	requètes de PING seront bloquées. <a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	?>
	<br>
	<form action="" method="POST">
		<input type="hidden" name="block" />
		<button value="block" class="btn btn-primary btn-large" type="submit">Bloquer le protocole ICMP</button>
	</form>
	</div>
<?php include('includes/footer.php'); ?>