<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class MoveTAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        $tache->setStatut(3);
        $dao->update($tache);
		return "listeActivites";
	}
}
?>