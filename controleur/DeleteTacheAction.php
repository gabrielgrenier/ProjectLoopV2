<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class DeleteTacheAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        if(isset($_REQUEST['id'])){
            $tache = $dao->find($_REQUEST['id']);
            if($tache!=null and $tache->getUserAssigned()==$_SESSION["current_user"]){$dao->delete($tache);}
        }
		return "listeActivites";
	}
}
?>