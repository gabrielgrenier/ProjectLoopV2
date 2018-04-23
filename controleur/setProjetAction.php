<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class setProjetAction implements Action {
	public function execute(){
        $_SESSION["numProjet"]= $_REQUEST["numPro"];
        $_SESSION["current_projet"]= $_REQUEST["nomPro"];
        return "listeActivites";
	}
}
?>