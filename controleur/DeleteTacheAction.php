<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
require_once('./modele/ProjetDAO.php');
class DeleteTacheAction implements Action {
	public function execute(){
        $tacheDAO = new TacheDAO();
        $projetDAO = new ProjetDAO();

        if(isset($_REQUEST['id'])){
            $tache = $tacheDAO->find($_REQUEST['id']);
            $proTemp = new Projets();
            $proTemp->setEmail($_SESSION['current_email']);
            $proTemp->setNumProjet($_SESSION['numProjet']);
            $user = $projetDAO->findByProjet($proTemp);
            if($user!=null){
                if($tache!=null and $tache->getUserAssigned()==$_SESSION["current_user"] 
                    or $user->getRole()=="admin" or $user->getRole()=="modo"){
                    $tacheDAO->delete($tache);
                    $_SESSION["alert"]->setType("posTache");
                    $_SESSION["alert"]->setMessage("La tâche a été supprimiée.");
                }
                else{
                    $_SESSION["alert"]->setType("negTache");
                    $_SESSION["alert"]->setMessage("Vous n'avez pas les droits necessaire pour edit cette tâche.");
                }
            }
            else{
                $_SESSION["alert"]->setType("negTache");
                $_SESSION["alert"]->setMessage("Vous ne faite pas partit de ce projet.");
            }
        }
        else{
            $_SESSION["alert"]->setType("negTache");
            $_SESSION["alert"]->setMessage("Le ID de la tâche a supprimer n'est pas spécifié.");
        }
		return "listeActivites";
	}
}
?>