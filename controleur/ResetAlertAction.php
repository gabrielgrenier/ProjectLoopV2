<?php
require_once('./controleur/Action.interface.php');
class ResetAlertAction implements Action {
	public function execute(){
        $_SESSION["alert"]->setType("");
        $_SESSION["alert"]->setMessage("");
		return "listeProjets";
	}
}
?>