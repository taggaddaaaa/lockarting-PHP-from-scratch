<?php

$sql = "SELECT * FROM categorie";

$requete= $connexion->prepare($sql);
$requete->execute();

$categorie = $requete->fetchAll();
//var_dump($categorie);