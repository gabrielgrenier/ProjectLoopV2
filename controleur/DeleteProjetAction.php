<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
require_once('./modele/TacheDAO.php');
class DeleteProjetAction implements Action {
	public function execute(){
        $projetDao = new ProjetDAO();
        $tacheDao = new TacheDAO();
        $projet = $projetDao->find($_REQUEST['numDelete']);
        if($projet!=null){
            $projetDao->delete($projet);
            $tacheDao->deleteByNum($projet);
        }
		return "listeProjets";
	}
}
?>