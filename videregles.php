<?php
require('config.php');

session_start();

if(!isset($_SESSION['connected'])) {
	header('Location: login.php');
	exit();
}

if(isset($_POST['vidage'])) {
	ssh2_exec($connection, 'sudo iptables -F');
	header('Location: videregles.php?action=success');
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
	<h4>Vider les règles</h4>
	<br>
	<div class="alert alert-<?php if($_GET['action'] == 'success') { echo 'success'; } else { echo 'danger'; } ?>"><?php if($_GET['action'] == 'success') { echo 'Les règles ont bien été vidées !'; } else { echo 'Le vidage des règles perdra tous vos règlages précédements établis !'; } ?> <a class="close" data-dismiss="alert" href="#">&times;</a></div>
	<br>
	<form action="" method="post">
		<input type="hidden" name="vidage" />
		<button type="submit" class="btn btn-primary"><i class="icon-trash icon-white"></i> Vider les règles</button>
	</form>
	</div>
<?php include('includes/footer.php'); ?>