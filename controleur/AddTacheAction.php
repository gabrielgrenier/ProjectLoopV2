<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class AddTacheAction implements Action {
	public function execute(){
		return "listeActivites";
	}
}
?>