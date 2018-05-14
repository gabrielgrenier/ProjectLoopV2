
<!DOCTYPE html>

<html>

	<head>
		<title>Project Loop |Mon profils</title>
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
				require_once('/modele/UserDAO.php');
				require_once('./modele/UserDAO.php');
				$udao = new UserDAO();
				$user = $udao->find($_SESSION["current_email"]);
			?>
			<script language="JavaScript">
			//Exemple de fonction Javascript :
			function valider(f)
			{
			  if (f.fichierCv.value == "")
			    {
				 alert("Vous n'avez pas sélectionné de fichier à ajouter");
				 f.fichierCv.focus();
				 return false;
				}
			  return true;	
			}
			</script>
			<div id="profilAffichage">
				<h1> Editer mon profils </h1>
				<br />
				<div id="MonProfils">
					
					<div class="block">
					<p class="title">Compte:</p>
					<div id="compte">
						<img id="image"  src="./imagesProfils/<?php echo $_SESSION["current_image"];?>" width="150" height="150" >
						<form name="form1" method="post" action="?action=changerImage" enctype="multipart/form-data">
							<br />
							<input type="file" name="imageProfil" />
							<?php if (ISSET($_REQUEST["field_messages"]["image"])) 
	                            		echo "<span class=\"warningMessage\">".$_REQUEST["field_messages"]["image"]."</span><br />";
	                    	?>
							<input type="submit" value="Changer" />  
				    	</form>
				    	<br />
				    	<br />
						<?php if($_SESSION["modifier"] == true){?>
						<form  action="?action=modifierProfils" method="post">
							<p for="email">Email: <?php echo $user->getEmail();?></p> 
							<p>Username:  <?php echo $user->getUsername();?></p> 
							<label for="nom">Nom :</label><input name="nom" type="text" value="<?php echo $user->getNom();?>"  required="required"/><br />
							<label for="prenom">Prenom :</label><input name="prenom" type="text" value="<?php echo $user->getPrenom();?>"  required="required"/><br />
							<label for="password">Mot de passe :</label><input name="password" type="password" />
							    <?php if (ISSET($_REQUEST["field_messages"]["password"])) 
                            		echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
                    			?>
                    		<br />
							<label for="password2">Retaper vote mot de passe :</label><input name="password2" type="password" />
								<?php if (ISSET($_REQUEST["field_messages"]["password2"])) 
                            		echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password2"]."</span>";
                    			?>
							<br />
							<br />
							<input type="submit" value="Changer"/>
						</form>
						<form action="" method="post">
							<input name="action" value="affProfils" type="hidden" />
							<input value="Annuler" type="submit"  />
						</form>
						<br />

						<?php
						}
						else{
						?>
						<form action="" method="post">
							<p>Email: <?php echo $user->getEmail();?></p> 
							<p>Username:  <?php echo $user->getUsername();?></p> 
							<p>Nom:  <?php  echo $user->getNom();?></p> 
							<p>Prenom:  <?php echo $user->getPrenom();?></p> 
							<br />
							<input name="action" value="modifierProfils" type="hidden" />
	                   		<input value="Modifier" type="submit" />
	               		 </form>
	               		 <br />
	               		 	
						<?php
						}
						?>
					</div>
				</div>

				</div>
				

				<?php /*
										<p>Email: <input type="text" value="<?=$user->getEmail()?>"</p> 
						<p>Username: <input type="text" value="<?=$user->getUsername()?>"</p> 	
										<p>Nom: <input type="text" value="<?=$user->getNom()?>"</p> 
<p>Prenom: <input type="text" value="<?=$user->getPrenom()?>"</p> 
				*/
				?>
			</div>
		</div>
		<?php
			include("/vues/footer.php");
		?>
	</body>
</html>