<?php
include "config/config.inc.php";
//var_dump($_SESSION);
//creation de var = à "accueil"
$currentPage="accueil";

//s'il existe quelque chose dans mon URL
if(empty($_GET["page"])==false){
	$currentPage=$_GET["page"];
}

$controller="controllers/".$currentPage."Controller.php";
$vue="vues/".$currentPage."Vue.phtml";

if(file_exists($controller)==false || file_exists($vue)==false){ 
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	include "vues/404.phtml";
	die();
}

$sql = "SELECT * FROM categorie";
$requete= $connexion->prepare($sql);
$requete->execute();
$categories = $requete->fetchAll();

include $controller;
include $vue;

//var_dump($_SESSION)