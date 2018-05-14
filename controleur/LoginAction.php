<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UserDAO.php');
class LoginAction implements Action {
	public function execute(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if (!ISSET($_REQUEST["username"]))
			return "login";
		if (!$this->valide())
		{
			//$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
			return "login";
		}

		
		$udao = new UserDAO();
		$user = $udao->find($_REQUEST["username"]);
		if ($user == null)
			{
				$_REQUEST["field_messages"]["username"] = "Utilisateur inexistant.";
				return "login";
			}
		else if ($user->getPassword() != $_REQUEST["password"])
			{
				$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
				return "login";
			}
		/*$_SESSION["connecté"] = $_REQUEST["username"];*/
		$_SESSION["connecte"] = true;
		$_SESSION["user"] = $user;
		$_SESSION["current_email"] = $user->getEmail();
        $_SESSION["current_user"] = $user->getUsername();
        $_SESSION["current_nom"] = $user->getPrenom()." ".$user->getNom();
        $_SESSION["modifier"] = false;
        if($user->getImage() == ""){
        	$_SESSION["current_image"] = "noprofile.png";
        }
        else{
        	$_SESSION["current_image"] = $user->getImage();
		}
		return "default";
	}
	public function valide()
	{
		$result = true;
		if ($_REQUEST['username'] == "")
		{
			$_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
			$result = false;
		}	
		if ($_REQUEST['password'] == "")
		{
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}	
		return $result;
	}
}
?>