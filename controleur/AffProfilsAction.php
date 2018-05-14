<?php
require_once('./controleur/Action.interface.php');
class AffProfilsAction implements Action {
	public function execute(){
				$_SESSION["modifier"] = false;
                return "profils";
	}
}
?>