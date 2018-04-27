<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.php');
class EditTacheAction implements Action {
	public function execute(){
        $dao = new TacheDao();
        if(isset($_REQUEST["idEdit"])){
            $tache = $dao->find($_REQUEST["idEdit"]);
            if($tache!=null){return "listeActivites";} //si la tache existe, on garde idEdit
        }
        
        $_REQUEST["action"]="";//si la tache n'existe pas, on desactive l'edit
		return "listeActivites";
	}
}
?>