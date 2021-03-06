<html>
<head>
    <title>Mes Projets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
</head>
    
<body>
<?php
    if(isset($_REQUEST["action"]) and $_REQUEST["action"]!="affProjets" and $_REQUEST["action"]!="editProjet"){header('Location: ?action=affProjets');}
    include("./vues/menuPasCo.php");
    
    //supprimer les alertes de tache
    if(isset($_SESSION["alert"]) and $_SESSION["alert"]->getType()=="posTache" or $_SESSION["alert"]->getType()=="negTache"){
        $_SESSION["alert"]->setType("");
        $_SESSION["alert"]->setMessage("");
    }
?>
<br/><br/>
    
<div class="container" style="padding-top:100px; padding-bottom:462px;">
    <?php //Les différentes alerts 
    if(isset($_SESSION["alert"])){
        if($_SESSION["alert"]->getType()=="posPro"){
            ?>
            <div class="alert alert-success">
                <strong>Succès!</strong> <?php echo $_SESSION["alert"]->getMessage(); ?>
                <a href="?action=resetAlert" class="close" data-dismiss="alert" title="fermer">x</a>
            </div>
    <?php
        }
        if($_SESSION["alert"]->getType()=="negPro"){
            ?>
            <div class="alert alert-danger" style="margin-top:5em;">
                <strong>Erreur!</strong> <?php echo $_SESSION["alert"]->getMessage(); ?>
                <a href="?action=resetAlert" class="close" data-dismiss="alert" title="fermer">x</a>
            </div>
    <?php
        }
    }
    ?>
    <h1>Mes Projets :</h1>
    <button class="btn btn-default" onclick="affCreateProjet()" id="btnAddProjet">Ajouter un Projet</button>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom du Projet :</th>
                <th>Numéro du Projet :</th>
                <th>Votre Rôle :</th>
                <th>Actions :</th>
            </tr>
        </thead>
        <tr style="display:none" id="createProjet"> <!--si on creer un projet-->
            <form action="?action=addProjet" method="post" id="formAddPro">
                <td><input type="text" id="addNomPro" name="nom" maxlength="20" placeholder=""></td>
                <td><input type="text" id="addNumPro" name="num" maxlength="5"></td>
                <input type="hidden" name="user" value="<?=$_SESSION["current_user"]?>">
                <td>admin</td>
                <td><a title="Confirmer" onclick="validationProjet('formAddPro')"><span class="glyphicon glyphicon-ok"></span></a>
                    <a title="Annuler" onclick="hideCreateProjet()"><span class="glyphicon glyphicon-remove"></span></a></td>
            </form>
        </tr>
    <?php //Cherche les projets a afficher
        $projetTest = $ProjetDao->findAll(); 
            foreach($projetTest as $projet) {
                if($_SESSION["current_email"]==$projet->getEmail()){
                    if(isset($_REQUEST["numEdit"]) and $projet->getNumProjet()==$_REQUEST["numEdit"] and $projet->getRole()=="admin"){ //ajouter si le user est le admin de la tache
        ?>
        <form action="?action=confirmEditPro" method="post" id="formEditPro"> <!--si on edit un projet-->
            <td><input type="text" name="editNomPro" value="<?=$projet->getNomProjet();?>" maxlength="20"></td>
            <td><?=$projet->getNumProjet();?></td>
            <td><?=$projet->getRole();?></td>
            <td>
                <a href="?action=affProjets" title="Annuler"><span class="glyphicon glyphicon-remove"></span></a>
                <a onclick="validationProjet('formEditPro')" title="Confirmer"><span class="glyphicon glyphicon-ok"></span></a>
            </td>
            <input type="hidden" name="editNumPro" value="<?=$projet->getNumProjet();?>">
        </form>
        <?php
                    }
                    else{
        ?>
        <tr>
            <td><?=$projet->getNomProjet();?></td>
            <td><?=$projet->getNumProjet();?></td>
            <td><?=$projet->getRole();?></td>
            <td><a href="?action=setProjet&numPro=<?=$projet->getNumProjet()?>" title="afficher projet"><span class="glyphicon glyphicon-eye-open"></span></a>
            <?php if($projet->getRole()=="admin"){?>
                <a id="delProjet" title="supprimer le projet" onclick="confirmation('?action=deletePro&numDelete=<?=$projet->getNumProjet()?>')"><span class="glyphicon glyphicon-trash"></span></a>
                <a href="?action=editProjet&numEdit=<?=$projet->getNumProjet()?>" title="modifier le projet"><span class="glyphicon glyphicon-edit"></span></a>
            <?php }?></td>
        </tr>
    <?php
                    }  
                }
            }
    ?>
    </table>
</div>
</body>
</html>
<?php
    include("./modele/script/affScript.php");
    include("./modele/script/validationScript.php");
    include("./modele/script/confirmation.php");
?>