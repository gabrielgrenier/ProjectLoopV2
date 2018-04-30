<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
require_once('./modele/TacheDAO.php');
class DeleteProjetAction implements Action {
	public function execute(){
        $projetDao = new ProjetDAO();
        $tacheDao = new TacheDAO();
        if(isset($_REQUEST['numDelete'])){
            $proTemp = new Projets();
            $proTemp->setEmail($_SESSION['current_email']);
            $proTemp->setNumProjet($_REQUEST['numDelete']);

            $projet = $projetDao->findByProjet($proTemp);
            if($projet!=null and $projet->getRole()=="admin"){
                $projetDao->delete($projet);
                $tacheDao->deleteByNum($projet);
            }
        }
		return "listeProjets";
	}
}
?>