<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class MoveAFAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        $tache->setStatut(1);
        $dao->update($tache);
		return "listeActivites";
	}
}
?>