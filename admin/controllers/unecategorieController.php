<?php
$sql = "SELECT * FROM categorie WHERE id=:categorieParticuliere";

$requete= $connexion->prepare($sql);
$requete->bindValue(":categorieParticuliere", $_GET["id"]);
$requete->execute();

$categorieParticuliere = $requete->fetchAll();
//var_dump($categorieParticuliere);



$sql = "SELECT * FROM `article` WHERE idCategorie=:nouvelId";

$requete= $connexion->prepare($sql);
$requete->bindValue(":nouvelId", $_GET["id"]);
$requete->execute();

$articlesCategorie = $requete->fetchAll();
//var_dump ($articlesCategorie);