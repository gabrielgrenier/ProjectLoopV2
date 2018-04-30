<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
class kickUserAction implements Action {
	public function execute(){
        $dao = new ProjetDAO();
        if(isset($_REQUEST["user"])&&isset($_REQUEST["num"])){
            $proVeri = new Projets(); //projet pour verifier le user
            $proVeri->setEmail($_SESSION["current_email"]);
            $proVeri->setNumProjet($_REQUEST["num"]);
            $proUser = $dao->findByProjet($proVeri);
            if($proUser!=null && $proUser->getRole()!="user"){
                $proTemp = new Projets(); //projet pour trouver le projet a delete
                $proTemp->setEmail($_REQUEST["user"]);
                $proTemp->setNumProjet($_REQUEST["num"]);
                $projet = $dao->findByProjet($proTemp);
                if($projet!=null && $projet->getRole()!="admin"){
                    $dao->kickUser($projet);
                    return "listeActivites";
                }
            }
            return "listeActivites";
        }
	}
}
?>
