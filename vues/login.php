
<html>

<?php 
if($_SESSION["connecte"]){header('Location: ?action=affProjets');}
 ?>
<head>
    <title>Project Loop |Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet" />
</head>

<body>
<div>
<?php
	include("./vues/MenuPasCo.php");
?>
	 <div class="padding" style="height:92.5%">
<?php
	if (ISSET($_REQUEST["global_message"]))
	   $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
	$u = "";
	if (ISSET($_REQUEST["username"]))
		$u = $_REQUEST["username"];
?>	<br/><br/>
        <div class="container">
            <div class="col-sm-6">
                <h2>Connexion</h2>
                <form action="" method="post">
                    <label for="username">Nom utilisateur :</label><br /> <input name="username" type="text" value="<?php echo $u?>" />
                    <?php if (ISSET($_REQUEST["field_messages"]["username"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
                    ?>
                    <br />
                    <label for="password">Mot de passe    :</label><br /> <input name="password" type="password" />
                    <?php if (ISSET($_REQUEST["field_messages"]["password"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
                    ?>
                    <br />
                    <a id="IncriptionLien" href="?action=inscrire"> S'inscrire</a>
                    <br />
                    <input name="action" value="connecter" type="hidden" />
                    <input value=" OK " type="submit" />
                </form>
            </div>
            <div class="col-sm-6">
        </div>
	</div>
</div>
<?php
	include("/vues/footer.php");
?>
</body>
</html>


