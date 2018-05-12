<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class MoveTAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        date_default_timezone_set('America/Toronto');
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        
        if($tache!=null){
            if($tache->getUserAssigned()==$_SESSION["current_user"]){
                $tache->setStatut(3);
                $tache->setDateDebut(date("Y/m/d"));
                $dao->update($tache);
            }
            else{
                $_SESSION["alert"]->setType("negTache");
                $_SESSION["alert"]->setMessage("Vous ne disposez pas des droits necessaire pour déplacer cette tâche.");
            }
        }
        else{
            $_SESSION["alert"]->setType("negTache");
            $_SESSION["alert"]->setMessage("la tache n'existe pas.");
        }
		return "listeActivites";
	}
}
?>