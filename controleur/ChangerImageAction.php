<?php
require_once('./controleur/Action.interface.php');
class ChangerImageAction implements Action {
	public function execute(){ 
		$_SESSION["modifier"] = false;
		if (!ISSET($_FILES['imageProfil']) || $_FILES['imageProfil']["name"]=="")
		   {
		   	$_REQUEST["field_messages"]["image"] = "Pas de fichier joint";
		   	return "profils";
		   }
		  else
		   {
			$dossier = "./imagesProfils/"; 	
			$nomFichier = $_FILES["imageProfil"]["name"];
			if (copy($_FILES["imageProfil"]["tmp_name"],$dossier.$nomFichier))
				{
				  unlink($_FILES['imageProfil']['tmp_name']);
				  echo $_SESSION["current_image"] = $nomFichier;
				  $user = New User();
				  $dao = new UserDAO();
				  $user->setEmail($_SESSION["current_email"]);
				  $user->setImage($nomFichier);
				  $dao->updateImage($user);
				  return "profils";
				}
			else
				$_REQUEST["field_messages"]["image"] = "Fichier non ajouté";
				return "profils";
			}
	}	
}
?>	