<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=starwars_game;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$_POST["pseudo"] = $pseudo;

$reponse = $bdd->query('SELECT pseudo FROM game');

$samePseudo = false;
while($players = $reponse->fetch()){
    if ($players['pseudo'] == $pseudo) {
            $samePseudo = true;
    }
}

$reponse->closeCursor();
$_SESSION['playerName'] = $pseudo;

if ($samePseudo == true) {
        $_SESSION['playerType'] = "old";
        header("Location: http://localhost/Plane%20vs%20eagle/index.php?play=true)");
} else {
        $_SESSION['playerType'] = "new";
        header("Location: http://localhost/Plane%20vs%20eagle/index.php?play=true");
}






?>