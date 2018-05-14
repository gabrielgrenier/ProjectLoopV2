<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
require_once('./modele/ProjetDAO.php');
class EditTacheAction implements Action {
	public function execute(){
        $tacheDAO = new TacheDao();
        $projetDAO = new ProjetDao();
        
        $projetTemp = new Projets();
        $projetTemp->setEmail($_SESSION["current_email"]);
        $projetTemp->setNumProjet($_SESSION["numProjet"]);
        
        $proRole = $projetDAO->findByProjet($projetTemp);
        if($proRole!=null){
            if(isset($_REQUEST["idEdit"])){
                $tache = $tacheDAO->find($_REQUEST["idEdit"]);
                if($tache!=null){ //si la tache existe, on garde idEdit
                    if($tache->getUserAssigned()==$_SESSION["current_user"] or $proRole->getRole()=="admin" or $proRole->getRole()=="modo"){return "listeActivites";}
                    else{
                        $_SESSION["alert"]->setType("negTache");
                        $_SESSION["alert"]->setMessage("Vous n'avez pas les droits necessaire pour editer cette tâche.");
                    }
                }
                else{
                    $_SESSION["alert"]->setType("negTache");
                    $_SESSION["alert"]->setMessage("La tâche à modifier n'existe pas.");
                }
            }
            else{
                $_SESSION["alert"]->setType("negTache");
                $_SESSION["alert"]->setMessage("Vous devez entrer l'id de la tâche à edit.");
            }
        }
        else{
            $_SESSION["alert"]->setType("negTache");
            $_SESSION["alert"]->setMessage("Vous ne faites pas partit de ce projet.");
        }
        $_REQUEST["action"]="";//si la tache n'existe pas, on desactive l'edit
        return "listeActivites";
    }
}
?>