<?php

$errors = [];

if(!empty($_POST))
{
	//si le prenom est vide
	if(empty($_POST["fname"])){
		// ajouter une erreur au tableau $error
		array_push($errors, "veuillez saisir votre prénom dans le champs Prénom");
	}
	
	//si le nom est vide
	if(empty($_POST["lname"])){
		// ajouter une erreur au tableau $error
		array_push($errors, "veuillez rentrer votre nom dans le champs Nom");
	}

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

	//si $error est vide
	if(empty($errors)){

		$sql="INSERT INTO ux (fname,lname,email,mdp) VALUES (:valueFname,:valueLname,:valueMail,:valueMdp)";
		$requete= $connexion->prepare($sql);
		$requete->bindValue(":valueFname", $_POST["fname"]);
		$requete->bindValue(":valueLname", $_POST["lname"]);
		$requete->bindValue(":valueMail", $_POST["email"]);
		$requete->bindValue(":valueMdp", sha1($_POST["mdp"]));
		$success = $requete->execute();

		if($success){
			header("Location:index.php");
		} else {
			var_dump($requete);
		}
	}/* else {
		var_dump($errors);
	}*/
}