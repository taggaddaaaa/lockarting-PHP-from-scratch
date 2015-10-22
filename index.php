<?php
include "admin/config/config.inc.php";

$sql = "SELECT * FROM article ORDER BY id DESC limit 3";
$requete= $connexion->prepare($sql);
$requete->execute();
$articles = $requete->fetchAll();

//Formulaire de contact
if(!empty($_POST))
{
    //si le prenom est vide
    if(empty($_POST["name"])){
        // ajouter une erreur au tableau $error
        array_push($errors, "veuillez saisir votre nom");
    }
    
    //si le nom est vide
    if(empty($_POST["phone"])){
        // ajouter une erreur au tableau $error
        array_push($errors, "veuillez rentrer votre téléphone");
    }

    //si l email est vide
    if(empty($_POST["email"])){
        // ajouter une erreur au tableau $error
        array_push($errors, "veuillez rentrer votre e.mail");
    }
    else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==FALSE){
        array_push($errors, "email non valide");
    }
    
    // si le mdp est vide
    if(empty($_POST["message"])){
        // ajouter une erreur au tableau
        array_push($errors, "veuillez rentrer un message");
    }

    //si $error est vide
    if(empty($errors)){

        $mailTitle = "[Formulaire de contact] nouvau message";
        $mailDest = "sabinecaizergues@hotmail.com";
        $mailContent = "Bonjour,\n\nVous avez reçu un nouveau message via votre formulaire de contact : \n\n\n";
        $mailContent .= "Auteur : ".$_POST["name"]."\n";
        $mailContent .= "Email de contact : ".$_POST["email"]."\n";
        $mailContent .= "Tel. de contact : ".$_POST["phone"]."\n\n\n";
        $mailContent .= $_POST["message"];

        mail($mailDest,$mailTitle,$mailContent);

        $success = "Votre message a bien été envoyé.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- description pour google: -->
    <meta name="description" content="A partir de 7 ans, en famille, entre amis ou pilote solitaire, Venez défier le chrono sur le circuit mythique de Pérols. Nous accueillons également les entreprises, les enterrement de vie de garçon ou fille. Pour plus d'infos: wwww.lockarting.fr ">
    <meta name="author" content="Sabine Caizergues">

    <!-- meta pour facebook: -->
    <meta property="og:title" content="Loc'karting - Circuit de karting de Pérols."/>
    <meta property="og:url" content="http://www;lockarting.fr"/>
    <meta property="og:image" content="DSC_8446.JPG"/>
    <meta property="og:description" content="A partir de 7 ans, en famille, entre amis ou pilote solitaire, Venez défier le chrono sur le circuit mythique de Pérols. Nous accueillons également les entreprises, les enterrement de vie de garçon ou fille. Pour plus d'infos: wwww.lockarting.fr ">
    <meta property="og:site_name" contact="www.lockarting.fr"/>

    <!-- meta pour twitter -->
    <meta name="twitter:site" content="@lockarting">
    <meta name="twitter:title" content="Circuit de karting à Pérols.">
    <meta name="twitter:description" content="A partir de 7 ans, en famille, entre amis ou pilote solitaire, Venez défier le chrono sur le circuit mythique de Pérols. Nous accueillons également les entreprises, les enterrement de vie de garçon ou fille.">
    <meta name="twitter:creator" content="@taggaddaaaa">
    <meta name="twitter:image:src" content="DSC_8446.JPG">


    <title>Loc'karting, circuit de karting de Pérols, près de Montpellier</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link href="css/full-slider.css" rel="stylesheet">

    <!-- mailchimp -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">


    <!-- script shareaholic ds chaque page! -->
    <script type="text/javascript">
    //<![CDATA[
      (function() {
        var shr = document.createElement('script');
        shr.setAttribute('data-cfasync', 'false');
        shr.src = '//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js';
        shr.type = 'text/javascript'; shr.async = 'true';
        shr.onload = shr.onreadystatechange = function() {
          var rs = this.readyState;
          if (rs && rs != 'complete' && rs != 'loaded') return;
          var site_id = 'edd7c50d40812a89619b7ed435fc5432';
          try { Shareaholic.init(site_id); } catch (e) {}
        };
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(shr, s);
      })();
    //]]>
    </script>



</head>

<body id="page-top" class="index">

    <!-- Script pour google analytics a inclure ds chaque page!!-->
    <?php include_once("analyticstracking.php") ?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img style="width: 250px;" src="img/logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Circuit</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Infos Pratiques</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Blog</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Boutique</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header  id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Carroussel -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- 1ere image du carroussel: -->
                <div class="fill" style="background-image:url(img/piste.JPG);"></div>
                <div class="carousel-caption">
                    <h2>Karting de loisir tout public et entreprises</h2>
                </div>
            </div>
            <div class="item">
                <!-- 2eme image du carroussel: -->
                <div class="fill" style="background-image:url(img/biplace.JPG);"></div>
                <div class="carousel-caption">
                    <h2>Des services adaptés à chacun</h2>
                </div>
            </div>
            <div class="item">
                <!--3eme image du carroussel: -->
                <div class="fill" style="background-image:url(img/Karting_23.JPG);"></div>
                <div class="carousel-caption">
                    <h2>A partir de 7 ans</h2>
                </div>
            </div>
        </div>

        <!-- Controls du carroussel -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
        
    </header>

    <!-- Circuit Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Le Circuit</h2>
                    <h3 class="section-subheading text-muted">Bienvenue sur le circuit mythique de Pérols.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="timeline-image">
                        <img class="img-circle img-responsive" src="img/circuit.JPG" alt="">
                    </div>
                    <h4 class="service-heading">Une piste de 700 mètres</h4>
                    <p class="text-muted">700 mètres d'asphalte, deux épingles, sept virages, une ligne droite. Dix minutes de course effreinée!</p>
                </div>
                <div class="col-md-4">
                    <div class="timeline-image">
                        <img class="img-circle img-responsive" src="img/kart.JPG" alt="">
                    </div>
                    <h4 class="service-heading">Des kartings nouvelle génération</h4>
                    <p class="text-muted">Notre parc de karting est révisé tous les jours par notre mécanicien. Le 120cc Mini kart est pour les enfants jusqu'à 13 ans et le 270cc Elite pour les adultes. Nous avons aussi un karting bi-places pour initier les plus jeunes aux joies de la piste, accompagnés d'un adulte.</p>
                </div>
                <div class="col-md-4">
                    <div class="timeline-image">
                        <img class="img-circle img-responsive" src="img/team.JPG" alt="">
                    </div>
                    <h4 class="service-heading">Un staff en or</h4>
                    <p class="text-muted">Une équipe professionnelle et souriante pour une expérience détendue en toute sécurité. Que vous soyez débutant, professionnel, timide ou pilote émérite, l'équipe s'adapte pour que chaque visite soit une excellente sortie!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Infos pratiques Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Infos pratiques</h2>
                    <h3 class="section-subheading text-muted">Vous saurez tout de nous!</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/ouvert.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Horaires</h4>
                        <p class="text-muted">Ouvert, pas ouvert?</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/carte.PNG" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Adresse</h4>
                        <p class="text-muted">Et comment venir nous voir...</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/sous.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tarifs</h4>
                        <p class="text-muted">Olala c'est pas cher!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Blog</h2>
                    <h3 class="section-subheading text-muted">Tenez-vous informés des toutes dernières actualités de Loc'karting. </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php
                            $i = 1;
                            foreach($articles as $entry){
                                if ($i % 2) {
                                    $liClass = "class=\"timeline-inverted\"";
                                } else {
                                    $liClass = "";
                                }
                        ?>
                            <li <?php echo $liClass; ?>>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src= "<?php echo 'img/'.$entry['image']; ?>" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?php echo $entry['titre']; ?></h4>
                                        <h4 class="subheading"><?php echo $entry['dateArticle']; ?></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <a href="admin" class="text-muted"><?php echo substr($entry['description'], 0, 150); ?> ...</a>
                                    </div>
                                </div>
                            </li>
                        <?php
                            $i++;
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<!-- Newsletter Section -->
    <section id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Inscrivez-vous à notre newsletter!</h2>
                    <div class="indicates-required"><span class="asterisk">*</span> Champs requis</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="mc_embed_signup">
                    <form action="http://lockarting.us11.list-manage.com/subscribe/post?u=4b0e4daf2e610870f7b8f179d&amp;id=44879ae741" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div class="row" id="mc_embed_signup_scroll">
                            <div class="col-md-6">
                                <div class="form-group mc-field-group">
                                    <label for="mce-EMAIL">Adresse Email  <span class="asterisk">*</span></label>
                                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>
                                <div class="form-group mc-field-group">
                                    <label for="mce-FNAME">Prénom  <span class="asterisk">*</span></label>
                                    <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
                                </div>
                                <div class="form-group mc-field-group">
                                    <label for="mce-LNAME">Nom  <span class="asterisk">*</span></label>
                                    <input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
                                </div>
                                <div class="form-group clear" id="mce-responses">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="success"></div>
                                <div class="form-group mc-field-group size1of2">
                                    <div class="mc-field-group size1of2">
                                        <label for="mce-BIRTHD-month">Anniversaire  <span class="asterisk">*</span></label>
                                        <div class="datefield">
                                            <span class="subfield dayfield"><input class="datepart required" type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHD[day]" id="mce-BIRTHD-day"></span> / 
                                            <span class="subfield monthfield"><input class="datepart required" type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHD[month]" id="mce-BIRTHD-month"></span> 
                                        </div>
                                    </div>
                                    <div class="form-group mc-field-group input-group">
                                        <strong>Genre  <span class="asterisk">*</span></strong>
                                        <ul>
                                            <li><input type="radio" value="Femme" name="GENDER" id="mce-GENDER-0"><label for="mce-GENDER-0">Femme</label></li>
                                            <li><input type="radio" value="Homme" name="GENDER" id="mce-GENDER-1"><label for="mce-GENDER-1">Homme</label></li>
                                        </ul>
                                    </div>
                                    <div class="form-group mc-field-group input-group">
                                        <strong>Source <span class="asterisk">*</span></strong>
                                        <ul>
                                            <li><input type="radio" value="Entreprise/CE" name="MMERGE5" id="mce-MMERGE5-0"><label for="mce-MMERGE5-0">Entreprise/CE</label></li>
                                            <li><input type="radio" value="Particulier" name="MMERGE5" id="mce-MMERGE5-1"><label for="mce-MMERGE5-1">Particulier</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- POUR LES ROBOTS -->
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>

                                <div class="clear">
                                    <input type="submit" value="Envoi" name="subscribe" id="mc-embedded-subscribe" class="btn btn-xl" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


        <!-- Boutique Section -->
        
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Boutique
                    </h2>
                    <h3 class="section-subheading text-muted">Offrez du karting!
                    </h3>
                </div>
            </div>

            <div class="row text-center">

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Billeterie Kart Mini 120cc</h3>
                            <p>Catégorie enfant de 7 à 13 ans. Session de 10 min.</p>
                            <p>
                                <a href="https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF" onclick="var w=window.open('https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF', 'Billetterie_weezevent', 'width=650, height=600, top=100, left=100, toolbar=no, resizable=yes, scrollbars=yes, status=no'); w.focus(); return false;" class="btn btn-primary">Offrir!</a> 
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>Billeterie Kart Elite 270cc</h3>
                            <p>Catégorie adulte à partir de 13ans. Sessions de 10 min.</p>
                            <p>
                                <a href="https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF" onclick="var w=window.open('https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF', 'Billetterie_weezevent', 'width=650, height=600, top=100, left=100, toolbar=no, resizable=yes, scrollbars=yes, status=no'); w.focus(); return false;" class="btn btn-primary">Offrir!</a>   
                            </p>
                        </div>
                    </div>
                </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                       
                    <div class="caption">
                        <h3>Billeterie Kart Biplace</h3>
                        <p>Karting bi-place pour un adulte et un enfant à partir de 5 ans. </p>
                        <p>
                            <a href="https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF" onclick="var w=window.open('https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF', 'Billetterie_weezevent', 'width=650, height=600, top=100, left=100, toolbar=no, resizable=yes, scrollbars=yes, status=no'); w.focus(); return false;" class="btn btn-primary">Offrir!</a>                            
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                      
                    <div class="caption">
                        <h3>Billeterie Kart Handikart</h3>
                        <p>Kart avec commandes au volant. Session de 10 min.</p>
                        <p>
                            <a href="https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF" onclick="var w=window.open('https://www.weezevent.com/widget_billeterie.php?id_evenement=127600&amp;code=32646&amp;width_auto=1&amp;color_primary=00AEEF', 'Billetterie_weezevent', 'width=650, height=600, top=100, left=100, toolbar=no, resizable=yes, scrollbars=yes, status=no'); w.focus(); return false;" class="btn btn-primary">Offrir!</a>                             
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">Pour se faire plaisir ou faire plaisir à quelqu'un, nous avons mis en place la vente en ligne de nos tickets.
                </p>
            </div>
        </div>
    </section>
    
        <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contactez-nous</h2>
                    <h3 class="section-subheading text-muted">Pour des informations complémentaires, une réservation, un devis, une suggestion, merci de renseigner les champs suivants.
                    </h3>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm"  method="POST" action="/">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Votre nom *" id="name" required data-validation-required-message="S'il vous plait, entrez votre nom.">
                                <p class="help-block text-danger">
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Votre Email *" id="email" required data-validation-required-message="S'il vous plait, entrez votre email.">
                                <p class="help-block text-danger">
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Votre téléphone *" id="phone" required data-validation-required-message="S'il vous plait, entrez votre numero de téléphone.">
                                <p class="help-block text-danger">
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Votre message *" id="message" required data-validation-required-message="S'il vous plait, entrez votre message."></textarea>
                                <p class="help-block text-danger">
                                </p>    
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success-mail"></div>
                            <input type="submit" class="btn btn-xl" value="Envoi" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; <a target="_blank" href="https://fr.linkedin.com/pub/sabine-caizergues/93/97b/522">Taggaddaaaa</a> <br>
                        TOUS DROITS RESERVES
                    </span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li>
                            <a target="_blank" href="https://plus.google.com/109144128606618517906/posts"><i class="fa fa-google-plus"></i></a>
                        </li>                            
                        <li>
                            <a target="_blank" href="http://www.facebook.com/lockarting"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://fr.linkedin.com/pub/jean-marie-caizergues/64/754/321"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
<!-- script "suivez nous" de shareaholic.com
                    <div class='shareaholic-canvas' data-app='follow_buttons' data-app-id='19415836'></div> -->
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li>
                            <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">Mentions légales</a>
                        </li>
                    </ul>
                </div>
            </div>            
        </div>
    </footer>

        <!-- Infos pratiques Modal 1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- CODE HORAIRES D'ETE 
                                <h2>Horaires d'été</h2>
                                <p class="item-intro text-muted">Est-ce que votre circuit préféré est ouvert?</p>
                                <img class="img-responsive img-centered" src="img/ete.jpg" alt="">
                                <p>Le circuit est ouvert <strong>TOUS LES JOURS</strong> de <strong>10h à 01h00</strong> du matin.
                                    Nous sommes fermés en cas de météo ne permettant pas la pratique sur circuit.</p>
                                    <p>
                                        Il pleut des cordes? Vous voulez être <strong>certain</strong> de ne pas vous déplacer pour rien? Vous avez raison! <strong>Appelez-nous!</strong> <i class="fa fa-phone"> <a href="tel:0467170342" title="0467170342">04.67.17.03.42</a></i></p>

                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>Retour</button> -->

                                    <!-- CODE HORAIRES D'HIVER-->
                                <h2>Horaires d'hiver</h2>
                                <p class="item-intro text-muted">Est-ce que votre circuit préféré est ouvert?</p>
                                <img class="img-responsive img-centered" style="width: 20%" src="img/horloge.jpg" alt="">
                                <p>Le circuit est ouvert <strong>du MERCREDI au VENDREDI de 14h00 à 18h30 et le week-end de 10h00 à 19h00.</strong> </br>
                                    Pendant les <strong> vacances scolaires</strong>, nous sommes ouverts <strong> tous les jours de 10h00 à 18h30</strong>.</br>
                                    Nous sommes fermés au mois de janvier pour nos congés annuels. </br>
                                    Nous sommes fermés en cas de météo ne permettant pas la pratique sur circuit.</p>
                                <p>
                                    <strong>Vous êtes perdu? Il pleut des cordes? Vous voulez être certain de ne pas vous déplacer pour rien?</strong>Vous avez raison! Appelez-nous! <i class="fa fa-phone"> 04.67.17.03.42</i></p>

                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i>Retour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- infos pratique modal VENIR -->
            <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2>Venir au circuit</h2>
                                    <p class="item-intro text-muted">Toutes les routes mènent à Loc'karting!</p>

                                    <iframe class="img-responsive img-centered" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.3459489010183!2d3.94257695!3d43.57851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6a4d6857453ff%3A0x78691696a454ae4!2sLoc+Karting!5e0!3m2!1sfr!2sfr!4v1436459269574" frameborder="0" style="border:0" allowfullscreen></iframe>

                                    <p>
                                        <h3>Notre adresse:</h3> <strong>Loc'karting, Route Departementale 172, Lieu-dit La Pailletrice, 34470 Pérols.</strong>
                                    </p>

                                    <p>Si vous venez en <strong>voiture</strong>, nous vous conseillons d'utiliser votre GPS, par exemple WAZE <a target="_blank" href="https://www.waze.com/livemap?zoom=17&lat=43.57892&lon=3.94289"> ICI</a>.</p>

                                    <p>Si vous venez en <strong>tram</strong>, nous vous conseillons d'utiliser le site de la TAM <a target="_blank" href="http://tam.cartographie.pro/"> ICI</a> en renseignant l'arrêt ECOPOLE, sur la LIGNE 3, direction PÉROLS. <br> Le circuit est à 600 mètres à pieds de l'arrêt.</p>

                                    <p>Si vous venez à <strong>pieds</strong>, nous vous conseillons d'utiliser GOOGLE MAPS <a target="_blank" href="https://www.google.fr/maps/dir//Loc+Karting,+Route+Departementale+172,Lieu-dit+La+Pailletrice,+34470+P%C3%A9rols/@43.57851,3.9425769,17z/data=!4m13!1m4!3m3!1s0x12b6a4d6857453ff:0x78691696a454ae4!2sLoc+Karting!3b1!4m7!1m0!1m5!1m1!1s0x12b6a4d6857453ff:0x78691696a454ae4!2m2!1d3.9426138!2d43.5785184"> ICI</a>, en renseignant votre point de départ.</p>

                                    <p>Si vous venez en <strong>avion</strong> (veinard!), posez-vous à  <a target="_blank" href="http://www.montpellier.aeroport.fr/fr/passagers">l'aéroport de Montpellier Méditérannée. </a> Nous sommes tout à côté!</p>

                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Retour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Infos pratiques Modal Tarifs-->
            <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">

                                    <h2>Tarifs</h2>
                                    <p class="item-intro text-muted">Vous trouverez-ici nos tarifs location tout public. Contactez-nous pour un devis personnalisé.</p>
                                    <img class="img-responsive img-centered" src="img/cochon.jpg" alt="">
                                    <p>Nos séances de location durent <strong>10 minutes</strong> et sont encadrées par un moniteur BPJEPS qui vous dispense un briefing sécurité. <br class='autobr' />Loc'karting vous fournit casques, charlottes, et minerves pour les plus jeunes.<br class='autobr' />Un système de chronométrage informatisé vous permet de visualiser vos performances sur écran plat. <br class='autobr' /><strong>Mini 120 : </strong>à partir de 7 ans jusqu'à 13 ans, minimum 1 mètre 30.<br class='autobr' /><strong>Elite : </strong>à partir de 14 ans.<br class='autobr' /><strong>Bi-place : </strong>permet à un adulte de piloter le karting avec à ses côtés, un enfant ou une autre personne. <br class='autobr' /><strong>Handikart :</strong> avec ses commandes au volant, il permet le pilotage du karting pour certains types de handicaps.</p>

                                    <div class="row">

                                        <div class="table-responsive">
                                            <table class="table">


                                                <th class="active">Séries de 10 minutes</th>
                                                
                                                <th class="active">Mini Kart 120cc</th>
                                                
                                                <th class="active">Kart Elite 270cc</th>
                                                
                                                <th class="active">Kart Bi-place</th>
                                                
                                                <th class="active">Handikart</th>
                                                
                                                <tr>

                                                    <td>1 série de 10 minutes</td>
                                                    
                                                    <td>15,00 &#8364;</td>
                                                    
                                                    <td>19,00 &#8364;</td>
                                                    
                                                    <td>22,00 &#8364;</td>

                                                    <td>22,00 &#8364;</td>
                                                    
                                                </tr>
                                                
                                                <tr>

                                                    <td>2 s&#233;ries de 10 minutes</td>
                                                    
                                                    <td>28,00 &#8364;</td>
                                                    
                                                    <td>35,00 &#8364;</td>
                                                    
                                                    <td>40,00 &#8364;</td>

                                                    <td>-</td>
                                                    
                                                </tr>
                                                
                                                <tr>

                                                    <td>12 s&#233;ries de 10 minutes</td>
                                                    
                                                    <td>145,00 &#8364;</td>
                                                    
                                                    <td>190,00 &#8364;</td>
                                                    
                                                    <td>-</td>

                                                    <td>-</td>
                                                    
                                                </tr>
                                                
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="table-responsive">

                                            <table class="table">
                                                <tr>
                                                    <th class="active" rowspan="2">Formules</th>
                                                    <th class="active" colspan="2">GP 1</th>
                                                    <th class="active" colspan="2">GP 2</th>
                                                    <th class="active" colspan="2">GP 3</th>
                                                    <th class="active" rowspan="2">Anniversaires</th>
                                                </tr>
                                                <tr>
                                                    <!-- td from rowspan -->
                                                    <th class="column">de 6 à 18 pers.</th>
                                                    <th class="column">de 19 à 38 pers.</th>
                                                    <th class="column">de 6 à 18 pers.</th>
                                                    <th class="column">de 19 à 38 pers.</th>
                                                    <th class="column">de 6 à 18 pers.</th>
                                                    <th>de 19 à 38 pers.</th>
                                                    <!-- td from rowspan -->
                                                </tr>
                                                <tr>
                                                    <td>Tarifs</td>

                                                    <td>48,00€/pers</td>
                                                    <td>45,00€/pers</td>

                                                    <td>57,00€/pers</td>
                                                    <td>54,00€/pers</td>

                                                    <td>63,00€/pers</td>
                                                    <td>59,00€/pers</td>

                                                    <td>30,00 &#8364;/enfant</td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td>Temps de roulage</td>
                                                    <td colspan="2">10 min d'essai/qualif <br>+<br>15 min de course</td>
                                                    <td colspan="2">10 min d'essai <br>+<br>10 min de qualif <br>+<br>10 min de course</td>
                                                    <td colspan="2">10 min d'essai<br>+<br>10 min de qualif<br>+<br>15 min de course</td>
                                                    <td>2 sessions de 10 min</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Formule comprenant</td>
                                                    <td colspan="6">Podium</td>
                                                    <td>Gâteau <br>+<br> bonbons <br>+<br> boissons <br>+<br>diplôme<br>+<br> podium <br>+<br>1 médaille</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <p>Pour un tarif de groupe de plus de 14 personnes, CE, accueil d'entreprise, EDV de jeune fille ou garçon, veuillez-nous faire une demande<a href="#contact"> ICI</a> et fermez cette fenêtre.</p>
                                    
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Retour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2>Mentions Légales</h2>
                                    <p style="text-align: center">
                                    <p style="text-align: justify">
                                        <strong><font size="4">1. Présentation du site :</font><br />
                                             </strong><br />Conformément aux dispositions des articles 6-III et 19 de la Loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique, dite L.C.E.N., nous portons à la connaissance des utilisateurs et visiteurs du site:  <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> les informations suivantes :
                                    </p>
                                    <p style="text-align: justify">
                                        <b>Informations légales : </b>
                                    </p>
                                    <p style="text-align: justify">
                                        Statut du propriétaire : <strong>Société</strong><br />
                                        Préfixe : <strong>SARL unipersonnelle</strong><br />
                                        Nom de la société :<strong> Loc'karting</strong><br />
                                        Adresse : <strong>RD 172, Lieu dit la Pailletrice,  34470  Pérols</strong><br />
                                        Tél  : <strong>04.67.17.03.42</strong><br />
                                        Au capital de :<strong> 5000 €</strong><br />
                                        SIRET :  <strong>52805443000020   </strong>R.C.S. :<strong> 528054430 RCS Montpellier</strong><br />
                                        Numéro TVA intracommunautaire : <strong>FR42528054430</strong><br />
                                        Adresse de courrier électronique : <strong>lockarting-herault@orange.fr</strong> <br />
                                         <br />
                                        Le créateur du site est : <strong>Sabine Caizergues</strong><br />
                                        Le responsable de la  publication est : <strong>Sabine Caizergues</strong><br />
                                        Contactez le responsable de la publication : <strong>taggaddaaaa@outlook.com</strong><br />
                                        Le responsable de la publication est une <strong>personne physique</strong><br />
                                        <br />
                                        Le webmaster est  : <strong>Sabine Caizergues</strong><br />
                                        Contactez le webmaster : <strong><a href="mailto:taggaddaaaa@outlook.com?subject=Contact à partir des mentions légales via le site www.lockarting.fr">taggaddaaaa@outlook.com</a></strong><br />
                                        L’hébergeur du site est : <strong>Ovh 2 rue Kellermann  59100  Roubaix</strong><br />
                                        Crédits : Les mentions légales ont étés générées par <strong><a href="http://www.generer-mentions-legales.com">http://www.generer-mentions-legales.com</a></strong><br />
                                        <br />
                                        <br />
                                        <strong><font size="4">2. Conditions générales d’utilisation du site et des services proposés :</font></strong><br />
                                        <br />
                                        L’utilisation du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> implique l’acceptation pleine et entière des conditions générales d’utilisation  décrites ci-après. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, sans préavis, aussi les utilisateurs du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> sont  invités à les consulter de manière régulière.<br />
                                        <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> est par principe accessible aux utilisateurs 24/24h, 7/7j, sauf interruption, programmée ou non, pour les besoins de sa maintenance ou cas de force majeure. En cas d’impossibilité d’accès au service, <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> s’engage à faire son maximum afin de rétablir l’accès au service et s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.  N’étant soumis qu’à une obligation de moyen, <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> ne saurait être tenu pour responsable de tout dommage, quelle qu’en soit la nature, résultant d’une indisponibilité du service.
                                    </p>
                                    <p style="text-align: justify">
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> est mis à jour régulièrement par le propriétaire du site. De la même façon, les mentions légales peuvent être modifiées à tout moment, sans préavis, et s’imposent à l’utilisateur sans réserve. L’utilisateur est réputé les accepter sans réserve et s’y référer régulièrement pour prendre connaissance des modifications.<br />
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> se réserve aussi le droit de céder, transférer, ce sans préavis les droits et/ou obligations des présentes CGU et mentions légales. En continuant à utiliser les services du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> , l’utilisateur reconnaît accepter les modifications des conditions générales qui seraient intervenues.<br />
                                    </p>
                                    <p style="text-align: justify">
                                        <strong><font size="4">3. Description des services fournis :</font></strong><br />
                                        <br />
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> a pour objet de fournir une information concernant l’ensemble des activités de la société.<br />
                                        Le propriétaire du site s’efforce de fournir sur le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenu responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.<br />
                                        Tous les informations proposées sur le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> sont données à titre indicatif, sont non exhaustives, et sont susceptibles d’évoluer. Elles sont données sous réserve de modifications ayant été apportées depuis leur mise en ligne.<br />
                                    </p>
                                    <p style="text-align: justify">
                                        <strong><font size="4">4. Limites de responsabilité :</font></strong><br />
                                        <br />
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> utilise la technologie java script.<br />
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> ne saurait être tenu responsable des erreurs typographiques ou inexactitudes apparaissant sur le service, ou de quelque dommage subi résultant de son utilisation. L’utilisateur reste responsable de son équipement et de son utilisation, de même il supporte seul les coûts directs ou indirects suite à sa connexion à Internet.<br />
                                        <br />
                                        L’utilisateur du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> s’engage à accéder à celui-ci en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mise à jour.<br />
                                        <br />
                                        L’utilisateur dégage la responsabilité de <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> pour tout préjudice qu’il pourrait subir ou faire subir, directement ou indirectement, du fait des services proposés. Seule la responsabilité de l’utilisateur est engagée par l’utilisation du service proposé et celui-ci dégage expressément le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> de toute responsabilité vis-à-vis de tiers.<br />
                                        Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs. Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, le propriétaire du site se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, homophobe, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).<br />
                                        Il est ici rappelé que les développeurs du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> gardent trace de l'adresse mail, et de l'adresse IP de l'utilisateur. En conséquence, il doit être conscient qu'en cas d'injonction de l’autorité judiciaire il peut être retrouvé et poursuivi.<br />
                                    </p>
                                    <p style="text-align: justify">
                                        <strong><font size="4">5. Propriété intellectuelle et contrefaçons :</font></strong><br />
                                        <br />
                                        Le propriétaire du site est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logos, icônes, sons, logiciels…<br />
                                        Toute reproduction, représentation, modification, publication, adaptation totale ou partielle des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable à l'Email : <a href="mailto:taggaddaaaa@outlook.com?subject=Contact à partir des mentions légales via le site www.lockarting.fr"><strong>taggaddaaaa@outlook.com</strong></a> .<br />
                                        Toute exploitation non autorisée du site ou d'un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.<br />
                                    </p>
                                    <p style="text-align: justify">
                                        <strong><font size="4">6. Liens hypertextes et cookies :</font></strong><br />
                                        <br />
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> contient un certain nombre de liens hypertextes vers d’autres sites (partenaires, informations …) mis en place avec l’autorisation du propriétaire du site . Cependant, le propriétaire du site n’a pas la possibilité de vérifier le contenu des sites ainsi visités  et décline donc toute responsabilité de ce fait quand aux risques éventuels de contenus illicites.<br />
                                        <br />
                                        L’utilisateur est informé que lors de ses visites sur le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a>, un ou des cookies sont susceptibles de s’installer automatiquement sur son ordinateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.<br />
                                        <br />
                                        Le paramétrage du logiciel de navigation permet d’informer de la présence de cookies et éventuellement, de la refuser de la manière décrite à l’adresse suivante : www.cnil.fr<br />
                                        Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :<br />
                                        Sous Internet Explorer : Onglet outil / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.<br />
                                        Sous Netscape : Onglet édition / préférences. Cliquez sur Avancées et choisissez Désactiver les cookies. Validez sur Ok.<br />
                                    </p>
                                    <p style="text-align: justify">
                                        <strong><font size="4">7. Droit applicable et attribution de juridiction :</font></strong><br />
                                        <br />
                                        Tout litige en relation avec l’utilisation du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> est soumis au droit français. L’utilisateur ainsi que <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> acceptent de se soumettre à la compétence exclusive des tribunaux français en cas de litige.<br />
                                    </p>
                                    <p style="text-align: justify">
                                        <strong><font size="4">8. Protection des biens et des personnes - gestion des données personnelles :</font></strong><br />
                                        <br />
                                        Utilisateur : Internaute se connectant, utilisant le site susnommé : <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a><br />
                                        En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.
                                    </p>
                                    <p style="text-align: justify">
                                        Sur le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a>, le propriétaire du site ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés par le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a>. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> l’obligation ou non de fournir ces informations.<br />
                                        Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification, de suppression et d’opposition aux données personnelles le concernant. Pour l’exercer, adressez votre demande à <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> par Email au webmaster, ou faites une demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.
                                    </p>
                                    <p style="text-align: justify">
                                        Aucune information personnelle de l'utilisateur du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> au propriétaire du site et de ses droits permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis-à-vis de l'utilisateur du site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a>.<br />
                                        Le site <a href="http://www.lockarting.fr" target="_blank">www.lockarting.fr</a> est déclaré à la CNIL sous le numéro en cours.
                                    </p>
                                    <p style="text-align: justify">
                                        Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.
                                    </p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Retour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                                               
            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
            <script src="js/classie.js"></script>
            <script src="js/cbpAnimatedHeader.js"></script>

            <!-- Script to Activate the Carousel -->
            <script>
            $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
            </script>
            <!-- Script pour google analytics a inclure ds chaque page!!-->
            <?php include_once("analyticstracking.php") ?>

            <!-- Contact Form JavaScript -->
            <script src="js/jqBootstrapValidation.js"></script>
            <script src="js/contact_me.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="js/agency.js"></script>

            <!-- script mailchimp -->
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[4]='BIRTHD';ftypes[4]='birthday';fnames[3]='GENDER';ftypes[3]='radio';fnames[5]='MMERGE5';ftypes[5]='radio'; /*
             * Translated default messages for the $ validation plugin.
             * Locale: FR
             */
             $.extend($.validator.messages, {
                required: "Ce champ est requis.",
                remote: "Veuillez remplir ce champ pour continuer.",
                email: "Veuillez entrer une adresse email valide.",
                url: "Veuillez entrer une URL valide.",
                date: "Veuillez entrer une date valide.",
                dateISO: "Veuillez entrer une date valide (ISO).",
                number: "Veuillez entrer un nombre valide.",
                digits: "Veuillez entrer (seulement) une valeur numérique.",
                creditcard: "Veuillez entrer un numéro de carte de crédit valide.",
                equalTo: "Veuillez entrer une nouvelle fois la même valeur.",
                accept: "Veuillez entrer une valeur avec une extension valide.",
                maxlength: $.validator.format("Veuillez ne pas entrer plus de {0} caractères."),
                minlength: $.validator.format("Veuillez entrer au moins {0} caractères."),
                rangelength: $.validator.format("Veuillez entrer entre {0} et {1} caractères."),
                range: $.validator.format("Veuillez entrer une valeur entre {0} et {1}."),
                max: $.validator.format("Veuillez entrer une valeur inférieure ou égale à {0}."),
                min: $.validator.format("Veuillez entrer une valeur supérieure ou égale à {0}.")
            });}(jQuery));var $mcj = jQuery.noConflict(true);</script>

</body>

        </html>
