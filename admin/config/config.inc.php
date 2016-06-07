<?php
session_start();

//*********fichier de configuration serveur*********

//defines
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
//echo ROOT;
define("ROOT_CSS", ROOT."../css/");
//echo ROOT_CSS;
define("ROOT_JS", ROOT."../js/");
//echo ROOT_JS;
define("ROOT_IMG", ROOT."../img/");

// //connexion a la BDD de lockarting
$dataSource="mysql:host=lockartiiwblog.mysql.db;dbname=lockartiiwblog;charset=utf8";
$login="lockartiiwblog";
$mdp="Kartman34";
$connexion= new PDO($dataSource,$login,$mdp);
$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// //connexion a la BDD de localhost
// $dataSource="mysql:host=localhost;dbname=lockartiiwblog;charset=utf8";
// $login="root";
// $mdp="root";
// $connexion= new PDO($dataSource,$login,$mdp);
// $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

// $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);