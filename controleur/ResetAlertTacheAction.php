<?php
require_once('./controleur/Action.interface.php');
class ResetAlertTacheAction implements Action {
	public function execute(){
        $_SESSION["alert"]->setType("");
        $_SESSION["alert"]->setMessage("");
		return "listeActivites";
	}
}
?>