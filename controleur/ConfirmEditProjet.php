<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class confirmEditProjet implements Action {
	public function execute(){
        $dao = new ProjetDAO();
        if(isset($_REQUEST["editNumPro"]) and isset($_REQUEST["editNomPro"]) and $_REQUEST["editNomPro"]!=""){
            $projet = new Projets();
            $projet->setNomProjet($_REQUEST["editNomPro"]);
            $projet->setNumProjet($_REQUEST["editNumPro"]);
            $dao->update($projet);
            return "listeProjets";
        }
        
	}
}
?>

