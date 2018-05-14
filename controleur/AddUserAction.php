<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UserDAO.php');
require_once('./modele/ProjetDAO.php');
class AddUserAction implements Action {
	public function execute(){
        $UserDao = new UserDAO();
        $ProjetDao = new ProjetDao();
        if(isset($_REQUEST["num"])&&isset($_REQUEST["nom"])){
            $numPro = $_REQUEST["num"];
            $nomPro = $_REQUEST["nom"];
            $proRoleTemp = new Projets();
            $proRoleTemp->setNumProjet($numPro);
            $proRoleTemp->setEmail($_SESSION["current_email"]);
            
            $roleProjet = $ProjetDao->findByProjet($proRoleTemp);
            if($roleProjet->getRole()=="admin" or $roleProjet->getRole()=="modo"){
                $user = $UserDao->findByUsername($_REQUEST["addUsername"]);

                if($user!=null){ //si le user existe dans la bd
                    $proTemp = new Projets();
                    $proTemp->setEmail($user->getEmail());
                    $proTemp->setNumProjet($numPro);
                    $projet = $ProjetDao->findByProjet($proTemp);

                    if($projet==null){$ProjetDao->addUserProjet($user, $numPro, $nomPro);} //si le projet n'existe pas
                }
            }
        }
        return "listeActivites";
	}
}
?>