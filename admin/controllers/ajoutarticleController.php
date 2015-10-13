<?php	
//connexion
// die("ok");
$errors = [];
//var_dump($_POST);
// si $_POST n est pas vide
if(!empty($_POST))
{
	//si l  est vide
	if(empty($_POST["titre"])){
		// ajouter une erreur au tableau $error
		array_push($errors, "veuillez rentrer un titre");
	}
	// si l est vide
	if(empty($_POST["description"])){
		// ajouter une erreur au tableau
		array_push($errors, "veuillez rentrer une description");
	}
	//afiche ce que contient le tab $_POST
	//var_dump($_POST);
	//var_dump($_FILES);
	//die;


	if(empty($_FILES["image"])==true || $_FILES["image"]["error"]>0)
	{
			array_push($errors, "veuillez ajouter une photo");
	}
	else
	{
			$extensionsValides=["jpg", "jpeg", "png"];
			$extensionsImage=str_replace("image/", "", $_FILES["image"]["type"]);
			//var_dump($extensionsImage);
			if(in_array($extensionsImage, $extensionsValides)==false)
			{
				array_push($errors, "Veuillez uploader une image valide!");
			}
	}

	//var_dump($errors);


	//si $error est vide
	if(empty($errors)){


		if(empty($errors)==true){
			$nomImage=uniqid().".".$extensionsImage;
		}


		$resultatUpload = move_uploaded_file($_FILES["image"]["tmp_name"], "vues/img/".$_FILES["image"]["name"]);
		if($resultatUpload==true)
		{

	// 	//die('aucune erreur');
				$sql="INSERT INTO `article`(`titre`, `description`, `dateArticle`, `image`, `auteur`, `idCategorie`)
				VALUES (:valueTitre,:valueDescription,:valueDateArticle,:valueImage,:valueAuteur,:valueIdCategorie)";
				$requete= $connexion->prepare($sql);
				$requete->bindValue(":valueTitre", $_POST["titre"]);
				$requete->bindValue(":valueDescription",($_POST["description"]));
				$requete->bindValue(":valueDateArticle",($_POST["date"]));
				$requete->bindValue(":valueImage",$_FILES["image"]["name"]);
				$requete->bindValue(":valueAuteur",($_POST["auteur"]));
				$requete->bindValue(":valueIdCategorie",($_POST["categories"]));
				$success = $requete->execute();
	// 	$user = $requete->fetch();
	// 	var_dump($user);
	// 	//die;
	// 	if(empty($user)==FALSE){
	// 		$_SESSION["logged"]=$user;
	// 		header("Location:index.php");
	// 		die();
	// 	};
	// 	//die();
		}
	};
};


$sql="SELECT id, titre FROM categorie";
$requete= $connexion->prepare($sql);
$requete->execute();
$categories= $requete->fetchAll();
//var_dump($categories);