<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class DesattribuerAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        $tache->setUserAssigned("");
        $dao->update($tache);
		return "listeActivites";
	}
}
?>