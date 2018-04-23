<html>

<?php 
    if($_SESSION["connecte"]){header('Location: ?action=default');}
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
    	$e = "";
        $no = "";
        $pr = "";
        $u = "";
        if (ISSET($_REQUEST["email"]))
            $e = $_REQUEST["email"];
        if (ISSET($_REQUEST["nom"]))
            $no = $_REQUEST["nom"];
        if (ISSET($_REQUEST["prenom"]))
            $pr = $_REQUEST["prenom"];
    	if (ISSET($_REQUEST["username"]))
    		$u = $_REQUEST["username"];
    ?>	
<br/><br/>
        <div class="container">
            <div class="col-sm-6">
                <h2>Inscription</h2>
                <form action="" method="post">
                    <label for="email">Entrer votre email :</label><br /> <input name="email" type="email" value="<?php echo $e?>" required="required"/>
                    <?php if (ISSET($_REQUEST["field_messages"]["email"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["email"]."</span>";
                    ?>
                    <br />
                    <label for="nom">Entrer votre nom :</label><br /> <input name="nom" type="text" value="<?php echo $no?>" />
                    <?php if (ISSET($_REQUEST["field_messages"]["nom"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["nom"]."</span>";
                    ?>
                    <br />
                    <label for="prenom">Entrer votre prenom :</label><br /> <input name="prenom" type="text" value="<?php echo $pr?>" />
                    <?php if (ISSET($_REQUEST["field_messages"]["prenom"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["prenom"]."</span>";
                    ?>
                    <br />
                    <label for="username">Entrer votre username :</label><br /> <input name="username" type="username" value="<?php echo $u?>"  required="required"/>
                    <?php if (ISSET($_REQUEST["field_messages"]["username"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
                    ?>
                    <br />
                    <label for="password">Entre votre Mot de passe    :</label><br /> <input name="password" type="password" />
                    <?php if (ISSET($_REQUEST["field_messages"]["password"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
                    ?>
                    <br />
					<label for="password2">Retaper votre Mot de passe    :</label><br /> <input name="password2" type="password" />
                    <?php if (ISSET($_REQUEST["field_messages"]["password2"])) 
                            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password2"]."</span>";
                    ?>
                    <br />
                    <input name="action" value="inscrire" type="hidden" />
                    <input value=" OK " type="submit" />
                </form>
            </div>
        </div>
	</div>
<?php
	include("/vues/footer.php");
?>
</div>
</body>
</html>