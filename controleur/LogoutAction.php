<?php
require_once('./controleur/Action.interface.php');
class LogoutAction implements Action {
	public function execute(){
		UNSET($_SESSION["connecte"]);
		UNSET($_SESSION["current_user"]);
		session_destroy();
		return "default";
	}
}
?>