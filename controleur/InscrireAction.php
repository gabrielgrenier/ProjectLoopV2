<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UserDAO.php');
class InscrireAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_REQUEST["email"]))
			return "inscription";
		$dao = new UserDAO();
		$x = new User();
		if (!$this->valide())
			return "inscription";	
		$x->setEmail($_REQUEST["email"]);
		$x->setNom($_REQUEST["nom"]);
		$x->setPrenom($_REQUEST["prenom"]);
		$x->setUsername($_REQUEST["username"]);
		$x->setPassword($_REQUEST["password"]);
		if(!$dao->create($x)) {
			if ($dao->isEmail($_REQUEST["email"])){
				$_REQUEST["field_messages"]["email"] = "Cet email existe d&eacute;j&agrave;";
				return "inscription";
			}
			if ($dao->isUsername($_REQUEST["username"])){
				$_REQUEST["field_messages"]["username"] = "Cet username existe d&eacute;j&agrave;";
				return "inscription";
			}
		}
		return "login";
	}
	public function valide(){
		$result = true;
		if ($_REQUEST['email'] == "")
		{
			$_REQUEST["field_messages"]["email"] = "Donnez votre email";
			$result = false;
		}
		if ($_REQUEST['password'] == "")
		{
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		};	
		if ($_REQUEST['username'] == "")
		{
			$_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
			$result = false;
		}		
		if ($_REQUEST['nom'] == "")
		{
			$_REQUEST["field_messages"]["nom"] = "Donnez votre nom";
			$result = false;
		}
		if ($_REQUEST['prenom'] == "")
		{
			$_REQUEST["field_messages"]["prenom"] = "Donnez votre prenom";
			$result = false;
		}
		if ($_REQUEST['password'] != $_REQUEST['password2'])
		{
			$_REQUEST["field_messages"]["password"] = "Les mots de passes ne sont pas identique";
			$result = false;
		}
		return $result;

	}	
}
?>
