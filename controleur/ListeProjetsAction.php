<?php
require_once('./controleur/Action.interface.php');
class ListeProjetstAction implements Action {
	public function execute(){
		return "listeProjets";
	}
}
?>