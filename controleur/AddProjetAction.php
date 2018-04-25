<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UserDAO.php');
require_once('./modele/ProjetDAO.php');
require_once('./modele/classes/Projets.php');
class AddProjetAction implements Action {
	public function execute(){
        $UserDao = new UserDAO();
        $ProjetDao = new ProjetDao();
        $numPro = $_REQUEST["num"];
        $nomPro = $_REQUEST["nom"];
        if($numPro!="" and $nomPro!=""){
            $confirm = $ProjetDao->find($numPro);
            if($confirm==null){
                $projet = new Projets();
                $projet->setNumProjet($numPro);
                $projet->setNomProjet($nomPro);

                $user = $UserDao->findByUsername($_REQUEST["user"]);
                if($user!=null){$ProjetDao->create($projet, $user);}
            }
        }
        return "listeProjets";
	}
}
?>