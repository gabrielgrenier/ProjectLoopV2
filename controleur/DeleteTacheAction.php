<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class DeleteTacheAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        if($tache!=null){$dao->delete($tache);}
		return "listeActivites";
	}
}
?>