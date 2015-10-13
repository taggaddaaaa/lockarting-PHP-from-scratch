<?php


if(empty($_GET['id'])==true){
	header("Location:index.php");
	die();
};

$sql = "SELECT * FROM `article` WHERE id= :valueId";

$requete= $connexion->prepare($sql);
$requete->bindValue(":valueId", $_GET["id"]);
$requete->execute();
//ci dessous j ecri sjuste detch sans All car je veux l article
// tt seul sans le tableau
$article = $requete->fetch();
//var_dump($article);

if(empty($article)){
	header($_SERVER["SERVEUR_PROTOCOL"]." 404 Not Found");
	include "vues/404.phtml";
	die();	
};

$errors = [];

//var_dump($_POST);

if(!empty($_POST))
{
	// die('le formulaire est rempli');

	if(empty($_POST["autor"])){
		array_push($errors, "veuillez rentrer un Alias dans le champs auteur");
	}


	if(empty($_POST["comment"])){
		array_push($errors, "veuillez rentrer un commentaire");
	}

	if(!array_key_exists("score", $_POST)){
		array_push($errors, "Veuillez cocher une note" );
	}
	else if($_POST["score"] < 0 || $_POST["score"] > 5){
		array_push($errors, "Veuillez rentrer une note valide");
	}

	// var_dump($_POST);
	// var_dump($errors);

	// die('affichage des erreurs');

	if(empty($errors)){

		// die('aucune erreur');

		$sql="INSERT INTO commentaire (auteur, note, contenu, dateCommentaire, idArticle) 
			VALUES(:valueAuteur, :valueNote, :valueContenu, :valueDate, :valueIdArticle)
			";
		$requete= $connexion->prepare($sql);
		
		
		$requete->bindValue(":valueAuteur", $_POST["autor"]);
		$requete->bindValue(":valueNote", $_POST["score"]);
		$requete->bindValue(":valueContenu", $_POST["comment"]);
		$requete->bindValue(":valueDate", date('Y-m-d h:i:s'));
		$requete->bindValue(":valueIdArticle", $_GET["id"]);
		
		$success = $requete->execute();
	};

};


$sql = "SELECT * FROM `commentaire` WHERE idArticle = :valueIdArticle";

$requete= $connexion->prepare($sql);
$requete->bindValue(":valueIdArticle", $_GET["id"]);
$requete->execute();
$commentaires = $requete->fetchAll();
//var_dump($commentaires);