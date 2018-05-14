<?php
require_once('./controleur/Action.interface.php');
class ListeProjetstAction implements Action {
	public function execute(){
		$_SESSION["modifier"] = false;
		return "listeProjets";
	}
}
?>