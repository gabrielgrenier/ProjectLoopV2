<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class SetUserAction implements Action {
	public function execute(){

        if(isset($_REQUEST["user"])&&isset($_REQUEST["projet"])){
            $dao = new ProjetDAO();
            $projetTemp = new Projets();
            $projetTemp->setEmail($_REQUEST["user"]);
            $projetTemp->setNumProjet($_REQUEST["projet"]);
            
            $projet = $dao->findByProjet($projetTemp);
            if($projet!=null){
                $projet->setRole("user");
                $dao->updateUser($projet);
                return "listeActivites";
            }
            return "listeProjets";
        }
	}
}
?>