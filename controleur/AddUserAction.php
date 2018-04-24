<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UserDAO.php');
require_once('./modele/ProjetDAO.php');
class AddUserAction implements Action {
	public function execute(){
        $UserDao = new UserDAO();
        $ProjetDao = new ProjetDao();
        $numPro = $_REQUEST["num"];
        $nomPro = $_REQUEST["nom"];
        $user = $UserDao->findByUsername($_REQUEST["addUsername"]);
        if($user!=null){$ProjetDao->addUserProjet($user, $numPro, $nomPro);}
        return "listeActivites";
	}
}
?>