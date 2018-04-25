<?php
require_once('./controleur/Action.interface.php');
class LogoutAction implements Action {
	public function execute(){
		UNSET($_SESSION["connecte"]);
		UNSET($_SESSION["current_user"]);
        UNSET($_SESSION["current_email"]);
        UNSET($_SESSION["current_projet"]);
        UNSET($_SESSION["numProjet"]);
		session_destroy();
		return "default";
	}
}
?>