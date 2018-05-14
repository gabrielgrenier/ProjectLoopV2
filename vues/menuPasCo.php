<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="menu" <?php
if($_SESSION["connecte"]){ ?> style="position:absolute; box-shadow: none;"<?php } ?>>

    <div class="container-fluid">
        <div clas="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./#parallax"><img id="logo" src="./images/logoPetit.png"/></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <?php if($_SESSION["connecte"]==false){?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="#" href="./#parallax">Accueil</a></li>
                        <li><a class="#" href="./#contenu1">À Propos</a></li>
                        <li><a class="#" href="./#contenu2">Fonctionnalités</a></li>
                        <li><a class="#" href="./#contenu3">Nous Contacter</a></li>
                        <li><a class="#" href="?action=connecter">Se Connecter</a></li>
                    </ul>
            <?php 
                }
                else{ ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?action=affProfils"><img id="profil" src="./imagesProfils/<?php echo $_SESSION["current_image"];?>" width="30" height="30" ></a></li> 
                        <li><a class= "#" href="?action=affProfils"><?php echo $_SESSION["current_nom"]; ?></a></li>
                        <li><a class="#" href="?action=affProjets">Mes Projets</a></li>
                        <li><a class="#" href="?action=deconnecter">Se Déconnecter</a></li>
                        
                    </ul>

            <?php }?>
            
        </div>
    </div>
</nav>

<li><a class="#" href="?action=affProfils">Mon Profile</a></li>