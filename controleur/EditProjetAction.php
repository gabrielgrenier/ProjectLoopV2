<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class editProjetAction implements Action {
	public function execute(){
        $ProjetDao = new ProjetDao();
        if(isset($_REQUEST["numEdit"]) and $_REQUEST["numEdit"]!=""){
            $proTemp = new Projets();
            $proTemp->setEmail($_SESSION["current_email"]);
            $proTemp->setNumProjet($_REQUEST["numEdit"]);
            
            $projet = $ProjetDao->findByProjet($proTemp);
            
            if($projet!=null){
                if($projet->getRole()=="admin"){return "listeProjets";}
                else{
                    $_SESSION["alert"]->setType("neg");
                    $_SESSION["alert"]->setMessage("Vous ne disposez pas des droit nécessaire pour éditer ce projet.");
                }    
            } 
            else{
                $_SESSION["alert"]->setType("neg");
                $_SESSION["alert"]->setMessage("Le projet n'existe pas.");
            }
        }
        else{
            $_SESSION["alert"]->setType("neg");
            $_SESSION["alert"]->setMessage("Vous devez entrer le numéro de projet avant de pouvoir l'éditer.");
        }
        $_REQUEST["action"]="affProjet"; //si il y a un probleme, on change l'action
		return "listeProjets";
	}
}
?>