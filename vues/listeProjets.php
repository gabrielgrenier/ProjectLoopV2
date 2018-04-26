<html>
<head>
    <title>Mes Projets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet" />
</head>
    
<body>
<?php
    if(isset($_REQUEST["action"]) and $_REQUEST["action"]!="affProjets" and $_REQUEST["action"]!="editProjet"){header('Location: ?action=affProjets');}
    include("./vues/menuPasCo.php");
?>
<br/><br/>
<div class="container">
    <h1 style="padding-top:2em;">Mes Projets :</h1>
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
        <tr style="display:none" id="createProjet">
            <form action="?action=addProjet" method="post" id="formAddPro">
                <td><input type="text" id="addNomPro" name="nom" maxlength="20" placeholder=""></td>
                <td><input type="text" id="addNumPro" name="num" maxlength="5"></td>
                <input type="hidden" name="user" value="<?=$_SESSION["current_user"]?>">
                <td>admin</td>
                <td><a title="Confirmer" onclick="validationProjet()"><span class="glyphicon glyphicon-ok"></span></a>
                    <a title="Annuler" onclick="hideCreateProjet()"><span class="glyphicon glyphicon-remove"></span></a></td>
            </form>
        </tr>
    <?php //Cherche les tâche à faire
        $projetTest = $ProjetDao->findAll(); 
                foreach($projetTest as $projet) {
                    if($_SESSION["current_email"]==$projet->getEmail()){           
        ?>
        <tr>
            <td><?=$projet->getNomProjet();?></td>
            <td><?=$projet->getNumProjet();?></td>
            <td><?=$projet->getRole();?></td>
            <td><a href="?action=setProjet&numPro=<?=$projet->getNumProjet();?>&nomPro=<?=$projet->getNomProjet()?>" title="afficher projet"><span class="glyphicon glyphicon-eye-open"></span></a>
            <?php if($projet->getRole()=="admin"){?><a href="" title="supprimer le projet"><span class="glyphicon glyphicon-trash"></span></a>
                                                    <a href="?action=editProjet&numEdit=<?=$projet->getNumProjet()?>" title="modifier le projet"><span class="glyphicon glyphicon-edit"></span></a>
            <?php }?></td>
        </tr>
    <?php
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
?>