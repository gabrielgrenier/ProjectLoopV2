<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class EditTacheAction implements Action {
	public function execute(){
		return "listeActivites";
	}
}
?>