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
        $tache = $dao->find($id);
        $tache->setTitre($titre);
        $tache->setDescription($description);
        $tache->setDateFin($date);
        $dao->update($tache);
		return "listeActivites";
	}
}
?>