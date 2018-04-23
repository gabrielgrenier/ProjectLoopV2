<?php
require_once('./controleur/Action.interface.php');
class AffActivitesAction implements Action {
	public function execute(){
		return "listeActivites";
	}
}
?>