<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class setProjetAction implements Action {
	public function execute(){
        $ProjetDao = new ProjetDao();
        if(isset($_REQUEST["numPro"])){
            $proTemp = $ProjetDao->find($_REQUEST["numPro"]);
            if($proTemp!=null){
                $_SESSION["numProjet"]= $proTemp->getNumProjet();
                $_SESSION["current_projet"]= $proTemp->getNomProjet();
                return "listeActivites";
            }
            else{
                return "listeProjets";
            }
        }
	}
}
?>