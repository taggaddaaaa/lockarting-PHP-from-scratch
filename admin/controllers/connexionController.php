<?php
 	
//connexion
// die("ok");

$errors = [];

// si $_POST n est pas vide
if(!empty($_POST))
{
	//si l email est vide
	if(empty($_POST["email"])){
		// ajouter une erreur au tableau $error
		array_push($errors, "veuillez rentrer votre e.mail dans le champs Email address");
	}
	else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==FALSE){
		array_push($errors, "email non valide");
	}
	
	// si le mdp est vide
	if(empty($_POST["mdp"])){
		// ajouter une erreur au tableau
		array_push($errors, "veuillez rentrer un mot de passe dans le champs Password");
	}
	//afiche ce que contient le tab $_POST
	//var_dump($_POST);
	//var_dump($errors);
	//die;

	//si $error est vide
	if(empty($errors)){

		//die('aucune erreur');

		$sql="SELECT * FROM UX WHERE email=:valueMail AND mdp=:valueMdp";
		$requete= $connexion->prepare($sql);
		$requete->bindValue(":valueMail", $_POST["email"]);
		$requete->bindValue(":valueMdp", sha1($_POST["mdp"]));
		$success = $requete->execute();
		$user = $requete->fetch();
		//var_dump($user);
		//die;
		if(empty($user)==FALSE){
			$_SESSION["user"]=$user;
			header("Location:index.php");
		}
		//die();
	} /*else {
		var_dump($errors);
	}*/
}