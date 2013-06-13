<?php
require('config.php');

session_start();

if(!isset($_SESSION['connected'])) {
	header('Location: login.php');
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
	<h4>Commandes adresse IP</h4>
	<br>
	<a href="bloquerip.php"><button class="btn btn-danger">Bloquer une adresse IP</button></a>
	<br><br>
	<a href="autoriserip.php"><button class="btn btn-success">Autoriser une adresse IP</button></a>
	<br><br>
	<h4>Commandes ports</h4>
	<br>
	<a href="fermerport.php"><button class="btn btn-danger">Fermer un port spécifique</button></a>
	<br><br>
	<a href="ouvrirport.php"><button class="btn btn-success">Ouvrir un port spécifique</button></a>
	<br><br>
	<h4>Commandes protocoles</h4>
	<br>
	<a href="bloquerudp.php"><button class="btn btn-danger">Bloquer protocole UDP</button></a>
	<br><br>
	<a href="autoriserudp.php"><button class="btn btn-success">Autoriser protocole UDP</button></a>
	<br><br><br>
	<a href="bloquericmp.php"><button class="btn btn-danger">Bloquer protocole ICMP</button></a>
	<br><br>
	<a href="autorisericmp.php"><button class="btn btn-success">Autoriser protocole ICMP</button></a>
	<br><br><br><br>
	<a href="bloquertrafic.php"><button class="btn btn-warning">Bloquer trafic extérieur</button></a>
	<br><br><br><br>
	<a href="videregles.php"><button class="btn btn-warning">Vider les règles iptables</button></a>
	</div>
<?php include('includes/footer.php'); ?>