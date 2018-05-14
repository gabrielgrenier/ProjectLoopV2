<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UserDAO.php');
class ModifierProfilsAction implements Action {
	public function execute(){ 
		if($_SESSION["modifier"] == false){
			$_SESSION["modifier"] = true;
			return "profils";
		}
		else{
			if (!ISSET($_REQUEST["nom"]))
				return "profils";
			$user2 = New User();
			$userOri = New User();
			$dao = new UserDAO();
			$userOri = $dao->find($_SESSION["current_email"]);
			if(!$this->valide()){
				return "profils";
			}
			$user2->setEmail($userOri->getEmail());
			$user2->setUsername($userOri->getUsername());
			if($_REQUEST["password"] ==""){
				$user2->setPassword($userOri->getPassword());
			}
			else{
				$user2->setPassword($_REQUEST["password"]);
			}
			
			$user2->setNom($_REQUEST["nom"]);
			$user2->setPrenom($_REQUEST["prenom"]);
	        $dao->update($user2);
	        $_SESSION["current_nom"] = $user2->getPrenom()." ".$user2->getNom();
	       	$_SESSION["modifier"] = false;
			return "profils";
		}
	}
	public function valide(){
		$result = true;
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
			$_REQUEST["field_messages"]["password2"] = "Les mots de passes ne sont pas identique";
			$result = false;
		}
		return $result;
	}
}