<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class DeleteProjetAction implements Action {
	public function execute(){
        $dao = new ProjetDAO();
        $projet = $dao->find($_REQUEST['numDelete']);
        if($projet!=null){$dao->delete($projet);}
		return "listeProjets";
	}
}
?>