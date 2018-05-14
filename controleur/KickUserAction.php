<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/ProjetDAO.php');
require_once('./modele/TacheDAO.php');
require_once('./modele/UserDAO.php');
class kickUserAction implements Action {
	public function execute(){
        $ProjetDao = new ProjetDAO();
        $TacheDao = new TacheDAO();
        $UserDao = new UserDAO();
        if(isset($_REQUEST["user"])&&isset($_REQUEST["num"])){
            $proVeri = new Projets(); //projet pour verifier le user
            $proVeri->setEmail($_SESSION["current_email"]);
            $proVeri->setNumProjet($_REQUEST["num"]);
            $proUser = $ProjetDao->findByProjet($proVeri);
            if($proUser!=null && $proUser->getRole()!="user"){//kick si le currentUser est admin ou modo
                $proTemp = new Projets(); //projet pour trouver le projet a delete
                $proTemp->setEmail($_REQUEST["user"]);
                $proTemp->setNumProjet($_REQUEST["num"]);
                $projet = $ProjetDao->findByProjet($proTemp);
                if($projet!=null && $projet->getRole()!="admin"){
                    $ProjetDao->kickUser($projet);
                    $user = $UserDao->find($_REQUEST["user"]);
                    if($user!=null){
                        $tacheUser = $TacheDao->findByUser($user->getUsername());
                        foreach($tacheUser as $tache){
                            $tache->setUserAssigned("");
                            $tache->setStatut(1);
                            $TacheDao->update($tache);
                        }
                    }
                    return "listeActivites";
                }
            }
            return "listeActivites";
        }
	}
}
?>
