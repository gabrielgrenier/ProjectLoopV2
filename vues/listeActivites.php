<?php
/*
    Auteur : Gabriel Braun-Grenier
    Date : 4/04/2018
*/
if($_SESSION["connecte"]==false){header('Location: ?action=default');}

if(isset($_REQUEST["action"]) and $_REQUEST["action"]!="affActivites" and $_REQUEST["action"]!="editTache"){ //pour avoir le meme url
    header('Location: ?action=affActivites');
}

date_default_timezone_set('America/Toronto');
$nbTacheStat1 = 0;
$nbTacheAss1 = 0;
$nbTacheStat2 = 0;
$nbTacheAss2 = 0;
$nbTacheStat3 = 0;
$nbTacheAss3 = 0;
$role = "";
$today = date("Y-m-d");

$projetRole = $ProjetDao->findAll(); 
foreach($projetRole as $projet){
    if($projet->getEmail()==$_SESSION["current_email"] and $projet->getRole()=="admin"){$role="admin";}
    if($projet->getEmail()==$_SESSION["current_email"] and $projet->getRole()=="modo"){$role="modo";}
    if($projet->getEmail()==$_SESSION["current_email"] and $projet->getRole()=="user"){$role="user";}
}

if($role==""){header('Location: ?action=default');}

$TacheStat1 = $TacheDao->findByStatut(1); 
foreach($TacheStat1 as $tache) { 
    if($tache->getNumProjet()==$_SESSION["numProjet"]){
        $nbTacheStat1 = $nbTacheStat1 +1;
        if($tache->getUserAssigned()==$_SESSION["current_user"]){$nbTacheAss1 = $nbTacheAss1 + 1;}
    }
}

$TacheStat2 = $TacheDao->findByStatut(2); 
foreach($TacheStat2 as $tache) { 
    if($tache->getNumProjet()==$_SESSION["numProjet"]){
        $nbTacheStat2 = $nbTacheStat2 +1;
        if($tache->getUserAssigned()==$_SESSION["current_user"]){$nbTacheAss2 = $nbTacheAss2 + 1;}
    }
}

$TacheStat3 = $TacheDao->findByStatut(3); 
foreach($TacheStat3 as $tache) { 
    if($tache->getNumProjet()==$_SESSION["numProjet"]){
        $nbTacheStat3 = $nbTacheStat3 +1;
        if($tache->getUserAssigned()==$_SESSION["current_user"]){$nbTacheAss3 = $nbTacheAss3 + 1;}
    }
}

?>

<head>
    <title>Liste de tâches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
</head>
<body>
<div id="menu">
<?php 
    include("./vues/menuPasCo.php");
?>
</div>

<div class="container" style="padding-top:100px; padding-bottom:462px;">
    <h1>
        <a href="?action=affProjets" title="Retour à la liste de projet"><span class="glyphicon glyphicon-menu-left"></span></a>
        <?php echo $_SESSION["current_projet"]; ?>
    </h1>
    <h3 id="numProjet">Numéro de projet : <?php echo $_SESSION["numProjet"]; ?></h3>
    
    <div class="dropdown"> <!--Menu d'Ajout de user au projet-->
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
              Ajouter des utilisateurs
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <form action="?action=addUser&num=<?=$_SESSION["numProjet"]?>&nom=<?=$_SESSION["current_projet"]?>" method="post">
                Nom de l'utilisateur : <input type="text" name="addUsername" /> <br/>
                <input type="submit" value="Ajouter"/>
            </form>
        </ul>
        <button class="btn btn-default" onclick="affStats()" id="btnStats">
            Afficher les statistiques <span class="caret"></span>
        </button>
        <button class="btn btn-default" onclick="affUsers()" id="btnUser">
            Afficher les utilisateurs <span class="caret"></span>
        </button>
    </div>
    
    <div class="row" id="statsProjet" style="display:none"> <!-- Les stats -->
        <div class="col-lg-7 col-md-4 col-sm-5 col-xs-12">
            <h4 class="titreGraph">Répartition des tâches selon leur statut</h4>
            <div id="piechart"></div>
        </div>
        <div class="col-lg-5 col-md-4 col-sm-5 col-xs-12">
            <h4 class="titreGraph">Répartition de vos tâches selon leur statut</h4>
            <div id="chart_div"></div>
        </div>
    </div>
    <div class="row" id="userProjet" style="display:none">
        <h3>Liste des utilisateurs : </h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Email :</th>
                    <th>Rôle :</th>
                    <th>Actions :</th>
                </tr>
            </thead>
            <?php     
            $projetTest = $ProjetDao->findAll(); 
                foreach($projetTest as $projet) {
                    if($_SESSION["numProjet"]==$projet->getNumProjet()){
            ?>
                <tr>
                    <td><?=$projet->getEmail();?></td>
                    <td><?=$projet->getRole();?></td>
                    <td>
                    <?php if($role=="admin" or $role=="modo"){?>
                        <?php if($projet->getEmail()!=$_SESSION["current_email"]){?>
                        <?php if($projet->getRole()=="modo") {?>
                            <a href="?action=setUser&user=<?=$projet->getEmail();?>&projet=<?=$_SESSION["numProjet"]?>" title="Rendre utilisateur">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                            <a a href="?action=kickUser&user=<?=$projet->getEmail();?>&num=<?=$projet->getNumProjet()?>" title="Retirer le user"><span class="glyphicon glyphicon-remove-circle"></span></a>
                        <?php }
                            else if($projet->getRole()!="admin"){
                        ?>
                            <a href="?action=setModo&user=<?=$projet->getEmail();?>&projet=<?=$_SESSION["numProjet"]?>" title="Rendre modo">
                                <span class="glyphicon glyphicon-chevron-up"></span>
                            </a>
                            <a href="?action=kickUser&user=<?=$projet->getEmail();?>&num=<?=$projet->getNumProjet()?>" title="Retirer le user"><span class="glyphicon glyphicon-remove-circle"></span></a>
                        <?php }?>

                    <?php 
                        }
                    }
                    ?>
                    </td>
                </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>
        
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
            <h3 style="color:#ff7f7f">
                À Faire
                <a onclick="affCreateTache()" title='Ajouter une tâche' id="btnAddTache" style="color:#ff7f7f"><span class="glyphicon glyphicon-plus-sign"></span></a>
            </h3>
                <div id="createTache" style="display:none;"> <!--Formulaire pour créé une tâche-->
                    <form action="?action=confirmAddTache" method="post">
                        <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#ff7f7f">
                            <div class="panel-heading" style="background-color:#ff7f7f">
                                <input type="text" name="titreAdd" id="titreAdd" placeholder="titre" maxlength="30" required>
                                <input type="hidden" name="numProjetAdd" value="<?=$_SESSION["numProjet"] ?>">
                                <button type="submit" class="btn btn-primary" style="background-color:#ff7f7f; border-style:none">
                                    <i class="glyphicon glyphicon-ok" style="color:#af0000"></i>
                                </button>
                                <a onclick="hideCreateTache()" title="Annuler l'ajout"><span class="glyphicon glyphicon-remove" style="color:#af0000"></span></a>
                            </div>
                            <div class="panel-body">
                                <textarea name="descriptionAdd" id="descriptionAdd" placeholder="description" name="descriptionEdit" maxlength="80"></textarea> <br/>
                                <input type="date" name="dateAdd" id="dateAdd" required> <br/>
                            </div>      
                        </div>
                    </form>
                </div>
            
            <?php //Cherche les tâche à faire
                $tacheStat1 = $TacheDao->findByStatut(1); 
                foreach($tacheStat1 as $tache) {
                    if($tache->getNumProjet()==$_SESSION["numProjet"]){ //si c'est le bon projet, on ajoute la tâche a la liste
            ?> 
            <?php if(!isset($_REQUEST['idEdit'])or $tache->getID()!=$_REQUEST['idEdit']){?>
                <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#ff7f7f">
                    <div class="panel-heading" style="background-color:#ff7f7f">
                        <p style="color:#af0000"><?=$tache->getTitre()?>
                            <?php if($tache->getUserAssigned()==$_SESSION["current_user"]) { ?> <!--seulement le user assigner peut modifier -->
                                <a href='?action=editTache&idEdit=<?=$tache->getId()?>' title='Modifier' style="color:#af0000"><span class="glyphicon glyphicon-edit"></span></a></p>
                            <?php } ?>
                    </div>
                    
                    <div class="panel-body">
                        <p><?=$tache->getDescription()?></p>
                        <?php if($tache->getDateDebut()!=null or $tache->getDateDebut()!=""){?>
                        <p>Date de debut : <?=$tache->getDateDebut()?></p>
                        <?php } ?>
                        <p>Date de fin : <?=$tache->getDateFin()?></p>
                        <?php  
                            if($tache->getUserAssigned()==$_SESSION["current_user"]) { ?> <!--Si le user connecté correspond au user de la tâche -->
                            <a href='?action=desattribuer&id=<?=$tache->getId()?>' title='Se désatribuer' style="color:#ff7f7f"><span class="glyphicon glyphicon-warning-sign"></span></a>
                            <a href='?action=moveEC&id=<?=$tache->getId()?>' title='Déplacer vers "En Cours"' style="color:#ff7f7f"><span class="glyphicon glyphicon-arrow-right"></span></a>
                        <?php } 
                            else if($tache->getUserAssigned()==""){ //si la tâche est attribuée à personne
                        ?>
                            <a href='?action=attribuer&id=<?=$tache->getId()?>&user=<?php echo $_SESSION["current_user"];?>' title="S'attribuer la tâche" style="color:#ff7f7f"><span class="glyphicon glyphicon-user"></span></a>
                        <?php } 
                            else{echo "<p style='font-style:italic; color:gray;'>tâche attribuée à ".$tache->getUserAssigned()."</p>";} //si la tâche est déjà attribuée
                            if($tache->getDateFin() < $today){echo "<p class='retard'>tâche en retard</p>";} //si la tache est en retard (css marche pas)
                        ?>
                    </div>
                </div>
            <?php
                    }
                //vérifie si on a le bon user avant d'edit une tâche
                if(isset($_REQUEST['idEdit']) and $tache->getID()==$_REQUEST['idEdit'] and $tache->getUserAssigned()==$_SESSION["current_user"]){ ?> 
                    <form action="?action=confirmEditTache&id=<?=$tache->getId()?>" method="post">
                        <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#ff7f7f">
                            <div class="panel-heading" style="background-color:#ff7f7f">
                                <input type="text" value="<?=$tache->getTitre()?>" name="titreEdit" placeholder="titre" required>
                                <button type="submit" class="btn btn-primary" style="background-color:#ff7f7f; border-style:none">
                                    <i class="glyphicon glyphicon-ok" style="color:#af0000"></i>
                                </button>
                                <a href="?action=affActivites" title="Annuler la modification"><span class="glyphicon glyphicon-remove" style="color:#af0000"></span></a>
                            </div>
                            <div class="panel-body">
                                <textarea name="descriptionEdit" placeholder="description" name="descriptionEdit"><?=$tache->getDescription()?></textarea> <br/>
                                <input type="date" name="dateEdit" value="<?=$tache->getDateFin()?>" required> <br/> <br/>
                                <a href="?action=deleteTache&id=<?=$tache->getId()?>" title="Supprimer la tâche"><span class="glyphicon glyphicon-trash" style="color:#ff7f7f"></span></a>
                            </div>      
                        </div>
                    </form>
            <?php
                    }
                }
            }
            ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
            <b><h3 style="color:#fffa00">En Cours</h3></b>
            <?php //Cherche les tâche en cours
                $tacheStat2 = $TacheDao->findByStatut(2);
                foreach($tacheStat2 as $tache) {
                    if($tache->getNumProjet()==$_SESSION["numProjet"]){ //si c'est le bon projet, on ajoute la tâche a la liste
            ?>
                <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#fffc7f">
                    <div class="panel-heading" style="background-color:#fffc7f">
                        <p style="color:#b2a600"><?=$tache->getTitre()?></p>
                    </div>
                    <div class="panel-body">
                        <p><?=$tache->getDescription()?></p>
                        <p>Date de début : <?=$tache->getDateDebut()?></p>
                        <p>Date de fin : <?=$tache->getDateFin()?></p>
                        <?php if($tache->getUserAssigned()==$_SESSION["current_user"]) { ?>
                            <a href='?action=moveAF&id=<?=$tache->getId()?>' title='Déplacer vers "À Faire"' style="color:#fffc7f"><span class="glyphicon glyphicon-arrow-left"></span></a>
                            <a href='?action=moveT&id=<?=$tache->getId()?>' title='Déplacer vers "En Cours"' style="color:#fffc7f"><span class="glyphicon glyphicon-arrow-right"></span></a>
                        <?php } 
                            else{echo "<p style='font-style:italic; color:gray;'>tâche attribuée à ".$tache->getUserAssigned()."</p>";} //si la tâche est déjà attribuée
                            if($tache->getDateFin() < $today){echo "<p class='retard'>tâche en retard</p>";} //si la tache est en retard (css marche pas)
                        ?>
                    </div>
                </div> 
            <?php
                    }
                }
            ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
            <h3 style="color:#7fff7f">Terminées</h3>
            <?php //cherche les tâches terminées
                $tacheStat3 = $TacheDao->findByStatut(3);
                foreach($tacheStat3 as $tache) {
                    if($tache->getNumProjet()==$_SESSION["numProjet"]){ //si c'est le bon projet, on ajoute la tâche a la liste
            ?>
                <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#7fff7f">
                    <div class="panel-heading" style="background-color:#7fff7f">
                        <p style="color:#29af00"><?=$tache->getTitre()?></p>
                    </div>
                    <div class="panel-body">
                        <p><?=$tache->getDescription()?></p>
                        <p>Date de début : <?=$tache->getDateDebut()?></p>
                        <p>Date de fin : <?=$tache->getDateFin()?></p>
                        <?php if($tache->getUserAssigned()==$_SESSION["current_user"]) { ?> <!--Seulement le user attribuer peut interagir avec ses tâches terminées-->
                        <a href='?action=moveEC&id=<?=$tache->getId()?>' title='Déplacer vers "En Cours"' style="color:#7fff7f"><span class="glyphicon glyphicon-arrow-left"></span></a>
                        <a href='?action=deleteTache&id=<?=$tache->getId()?>' title='Supprimer la tâche' style="color:#7fff7f"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php } 
                        if($tache->getUserAssigned()!=$_SESSION["current_user"]){
                                echo "<p style='font-style:italic; color:gray;'>tâche attribuée à ".$tache->getUserAssigned()."</p>";
                            }
                        ?>
                    </div>
                </div> 
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
    <?php 
    include("./vues/footer.php");
?>
</body>
<?php
    //scripts de graphiques
    include("./modele/script/pieChart.php");
    include("./modele/script/columnChart.php");
    //scripts de onClick display stats
    include("./modele/script/affScript.php");
?>