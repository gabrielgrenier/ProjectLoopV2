<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class EditTacheAction implements Action {
	public function execute(){
		$dao = new TacheDAO();
        if(isset($_REQUEST["titreEdit"]) and isset($_REQUEST["descriptionEdit"]) and isset($_REQUEST["dateEdit"])){//verifie que les champs sont remplis
            return "listeActivites";
        }
        else{
            $_REQUEST["action"]="affActivites";
            return "listeActivites";   
        }
	}
}
?>