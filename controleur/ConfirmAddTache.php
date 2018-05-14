<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class ConfirmAddTache implements Action {
	public function execute(){ //pas de verifications (pour faire cette tache on doit faire partie du projet)
        $dao = new TacheDAO();
        $titre = $_REQUEST['titreAdd'];
        $description = $_REQUEST['descriptionAdd'];
        $date = $_REQUEST['dateAdd'];
        $numProjet = $_REQUEST['numProjetAdd'];
        $tache = new Taches();
        $tache->setId(null);
        $tache->setNumProjet($numProjet);
        $tache->setTitre($titre);
        $tache->setDescription($description);
        $tache->setDateFin($date);
        $tache->setStatut(1);
        $dao->create($tache);
        $_SESSION["alert"]->setType("posTache");
        $_SESSION["alert"]->setMessage("La tâche a été créé.");
		return "listeActivites";
        
	}
}
?>