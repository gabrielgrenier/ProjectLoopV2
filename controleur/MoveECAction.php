<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class MoveECAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        date_default_timezone_set('America/Toronto');
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        if($tache!=null and $tache->getUserAssigned()==$_SESSION["current_user"]){
            $tache->setStatut(2);
            $tache->setDateDebut(date("Y/m/d"));
            $dao->update($tache);
        }
		return "listeActivites";
	}
}
?>