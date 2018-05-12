<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class ConfirmEditTache implements Action {
	public function execute(){
        $dao = new TacheDAO();
        $id = $_REQUEST['id'];
        $titre = $_REQUEST['titreEdit'];
        $description = $_REQUEST['descriptionEdit'];
        $date = $_REQUEST['dateEdit'];
        $userAssigned = $_REQUEST['userAssignedEdit'];
        $tache = $dao->find($id);
        if($tache!=null){
            if($tache->getNumProjet()==$_SESSION["numProjet"]){
                $tache->setTitre($titre);
                $tache->setDescription($description);
                $tache->setDateFin($date);
                $tache->setUserAssigned($userAssigned);
                $dao->update($tache);
                $_SESSION["alert"]->setType("posTache");
                $_SESSION["alert"]->setMessage("La tâche a été modifiée.");

            }
            else{
                $_SESSION["alert"]->setType("negTache");
                $_SESSION["alert"]->setMessage("La tâche que vous tentez de modifier ne fait pas partie de ce projet.");
            }
        }
        else{
            $_SESSION["alert"]->setType("negTache");
            $_SESSION["alert"]->setMessage("La tâche que vous tentez de modifier n'existe pas.");
        }
		return "listeActivites";
	}
}
?>