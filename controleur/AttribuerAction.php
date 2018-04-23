<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class AttribuerAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        $tache->setUserAssigned($_REQUEST['user']);
        $dao->update($tache);
		return "listeActivites";
	}
}
?>