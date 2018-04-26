<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class editProjetAction implements Action {
	public function execute(){
        $ProjetDao = new ProjetDao();
        if(isset($_REQUEST["numEdit"])){
            $projet = $ProjetDao->find($_REQUEST["numEdit"]);
            if($projet!=null){return "listeProjets";} //si le projet existe, on garde numEdit
        }
        $_REQUEST["action"]="affProjet"; //si le numero de projet n'existe pas, on retourne a affProjet
		return "listeProjets";
	}
}
?>