<!DOCTYPE html>
<html>
<?php 
	if (!ISSET($_SESSION)) {session_start();}
	if (!ISSET($_SESSION["connecte"])){$_SESSION["connecte"]= false;}
	if (!ISSET($_SESSION["current_user"])){$_SESSION["current_user"]= "";}
	if ($_SESSION["connecte"]){
		  header('Location: ?action=affProjets'); //changer pour le main
	}
    if (ISSET($_SESSION)){
    ?>
<head>
    <title>Project Loop | Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet" />
</head>

<body>
    <?php 
    include("./vues/menuPasCo.php");
    ?>
    <div id="parallax">
        <div class="landing-text">
            <img src="./images/logoPetit.png" id="imgAccueil"/>
            <h3>Le Gestionnaire de Projet Simplifié.</h3>
        </div>
    </div>
    <div class="padding" id="contenu1">
        <div class="container">
            <div class="col-sm-6">
                <img src="./images/ordiMac.png" class="img-responsive" />
            </div>
            <div class="col-sm-6 text-center">
                <h2>À Propos</h2>
                <p>Project Loop est parfait pour qui que vous soyez. Que vous êtes aux études ou 
                    au sein d'une grande entreprise, nos outils de gestion de projet vous seront <br/>
                    certainement utile ! De plus, notre plateforme est loin d'être compliquée,  <br/>
                    vous n'avez qu'à vous inscrire et de commencer à créer de nouveaux projets de <br/>
                    de rajouter des tâches à compléter. N'ayez pas peur, inscrivez-vous et commencer <br/>
                    à mieux gérer vos projets grâce à Project Loop !

                </p>
            </div>
        </div>
    </div>
    <div class="padding" id="contenu2">
        <div class="container">
            <h2>Fonctionnalités</h2> <br/>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>Une Gestion de Projet Simplifié</h4>
                    <p>Project Loop vous propose la gestion de projet la plus simple du marché. 
                        Que se soit un projet de petite ou grande ampleur, notre plateforme vous 
                        aidera à vous guider à travers les étapes de celui-ci.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <img src="./images/tableau.png" class="img-responsive" />
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>Des possibilité infies!</h4>
                    <p>Notre plateforme vous garantit un contrôle total sur vos projets 
                        et sur votre compte utilisateurs. En effet, après avoir créé votre 
                        premier projet, vous aurez la possibilité de le modifier comme vous 
                        le souhaitez.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <img src="./images/laptopCode.png" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
    <div id="fixed">
    </div>
    <div class="padding" id="contenu3">
        <div class="container">
            <div class="col-sm-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.648181402067!2d-73.5845177840561!3d45.55740247910211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91eace22b9bcf%3A0x18799aed17aa23d9!2sColl%C3%A8ge+de+Rosemont!5e0!3m2!1sfr!2sca!4v1519943892970" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-sm-6 text-center">
                <h2>Nous Contacter</h2>
                <p>Il est possible de nous rencontrer au collège de Rosemont,
                    mais il serait préférable que vous remplissiez le 
                    formulaire ci-dessous : </p>
                <form method="post" action="contactFormAction.php">
                    Votre Nom : <input type="text" name="nomContact" placeholder="Linus Torvalds" required> <br/><br/>
                    Votre Email : <input type="email" name="emailContact" placeholder="abc@xyz.com " required> <br/><br/>
                    <br><textarea name="questionContact" placeholder="Ecriver votre question ici!" required></textarea><br/><br/>
                    <input type="submit" name="btnEnvoieContact" value="Envoyer!">
                </form>
            </div>
        </div>
    </div>
    <?php 
    include("./vues/footer.php");
	}
    ?>
</body>
</html>

