<?php
// 1)connexion à la BDD
// 2) faire la requete permettant
//  de recuperer ts les articles(prepare, execute, fetchAll)
//  3) afficher les articles sur accueilVue.phtml

//attention ceci en dessous est pour "standardiser" la commande 
//(fetchAll(PDO::FETCH_ASSOC);) ce qui me permettra d ecrire 
//juste fetchAll(); à la place.

$articlesPerPages = 5;

$sql = "SELECT count(*) as nbarticles FROM article";

$requete= $connexion->prepare($sql);
$requete->execute();
$articlesCount = $requete->fetchAll(PDO::FETCH_ASSOC);
$count = $articlesCount[0]["nbarticles"];
$nbpages = ceil($count/$articlesPerPages);

if(isset($_GET["pagination"])){
	$page = $_GET["pagination"];
}else{
	$page = 0;
}
$nextpage = $page - 1;
if ($nextpage < 0) {
	$nextpage = -1;
}
$prevpage = $page + 1;
if ($prevpage > ($nbpages-1)) {
	$prevpage = -1;
}

$start = $page*$articlesPerPages;
$sql = "SELECT * FROM article ORDER BY id DESC limit ".$start.",".$articlesPerPages;

$requete= $connexion->prepare($sql);
$requete->execute();
$articles = $requete->fetchAll(PDO::FETCH_ASSOC);
//var_dump($articles);