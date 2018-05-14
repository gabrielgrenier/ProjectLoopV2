<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class AttribuerAction implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $tache = $dao->find($id);
        if($tache!=null){
            if($tache->getNumProjet()==$_SESSION["numProjet"]){
                if($tache!= null and $tache->getUserAssigned()==""){ //si la tâche est attribuer a personne
                    $tache->setUserAssigned($_REQUEST['user']);
                    $dao->update($tache);
                    //supprimer les alertes de projet
                    $_SESSION["alert"]->setType("posTache");
                    $_SESSION["alert"]->setMessage("La tâche vous est attribuée.");
                }
                else{
                    $_SESSION["alert"]->setType("negTache");
                    $_SESSION["alert"]->setMessage("La tâche que vous tentez de vous attribuer est déjà attribuer à quelqun.");
                }
            }
            else{
                $_SESSION["alert"]->setType("negTache");
                $_SESSION["alert"]->setMessage("La tâche que vous tentez de vous attribuer ne fait pas partie de ce projet.");
            }
        }
        else{
            $_SESSION["alert"]->setType("negTache");
            $_SESSION["alert"]->setMessage("La tâche vous tentez de vous attribuer n'existe pas.");
        }
        return "listeActivites";
	}
}
?>