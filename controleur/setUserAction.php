<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class SetUserAction implements Action {
	public function execute(){
        $dao = new ProjetDAO();
        $projetTemp = new Projets();
        $projetTemp->setEmail($_SESSION["current_email"]);
        $projetTemp->setNumProjet($_SESSION["numProjet"]);
        
        $proRole = $dao->findByProjet($projetTemp);
        if($proRole!=null){
            if($proRole->getRole()!="admin" or $proRole->getRole()!="modo"){
                if(isset($_REQUEST["user"])&&isset($_REQUEST["projet"])){
                    $projetTemp2 = new Projets();
                    $projetTemp2->setEmail($_REQUEST["user"]);
                    $projetTemp2->setNumProjet($_REQUEST["projet"]);


                    $projet = $dao->findByProjet($projetTemp);
                    if($projet!=null){
                        $projet->setRole("user");
                        $dao->updateUser($projet);
                        $_SESSION["alert"]->setType("posTache");
                        $_SESSION["alert"]->setMessage("L'utilisateur est désormais un utilisateur du projet.");
                    }
                    else{
                        $_SESSION["alert"]->setType("negTache");
                        $_SESSION["alert"]->setMessage("Vous devez être admin ou modo du projet pour faire ceci.");
                    }
                }   
            }
            else{
                $_SESSION["alert"]->setType("negTache");
                $_SESSION["alert"]->setMessage("Vous devez être admin ou modo du projet pour faire ceci.");
            }
        }
        else{
            $_SESSION["alert"]->setType("negTache");
            $_SESSION["alert"]->setMessage("Vous ne faites pas partit de ce projet.");
        }
        return "listeActivites";
	}
}
?>