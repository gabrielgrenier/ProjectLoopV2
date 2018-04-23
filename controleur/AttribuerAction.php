<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class AttribuerAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        if($tache!= null and $tache->getUserAssigned()==""){ //si la tâche est attribuer a personne
            $tache->setUserAssigned($_REQUEST['user']);
            $dao->update($tache);
            return "listeActivites";
        }
        else{return "listeActivites";}//si elle est deja attribuer, ne l'attribue pas
	}
}
?>