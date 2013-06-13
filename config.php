<?php

$username = 'Holox'; // USERNAME D'ACCES AU PANEL
$password = 'test'; // MOT DE PASSE D'ACCES AU PANEL

$connection = ssh2_connect('localhost', 22); // IP DU SERVEUR LINUX
ssh2_auth_password($connection, 'root', 'mot de passe'); // LOGS DE CONNEXION AU SERVEUR LINUX
?>