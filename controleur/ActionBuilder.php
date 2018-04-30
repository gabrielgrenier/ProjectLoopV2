<?php
require_once('./controleur/DefaultAction.php');
require_once('./controleur/LoginAction.php');
require_once('./controleur/LogoutAction.php');
require_once('./controleur/InscrireAction.php');
require_once('./controleur/ListeProjetsAction.php');
require_once('./controleur/AffActivitesAction.php');
require_once('./controleur/DesattribuerAction.php');
require_once('./controleur/AttribuerAction.php');
require_once('./controleur/MoveECAction.php');
require_once('./controleur/MoveAFAction.php');
require_once('./controleur/MoveTAction.php');
require_once('./controleur/EditTacheAction.php');
require_once('./controleur/ConfirmEditTache.php');
require_once('./controleur/AddTacheAction.php');
require_once('./controleur/ConfirmAddTache.php');
require_once('./controleur/DeleteTacheAction.php');
require_once('./controleur/setProjetAction.php');
require_once('./controleur/AddUserAction.php');
require_once('./controleur/AddProjetAction.php');
require_once('./controleur/EditProjetAction.php');
require_once('./controleur/ConfirmEditProjet.php');
require_once('./controleur/DeleteProjetAction.php');
require_once('./controleur/SetModoAction.php');
require_once('./controleur/SetUserAction.php');
require_once('./controleur/KickUserAction.php');

class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction)
		{
            case "connecter" :
				return new LoginAction();
			break; 
			case "deconnecter" :
				return new LogoutAction();
			    break;
            case "inscrire":
                return new InscrireAction();
                break;
            case "affProjets":
                return new ListeProjetstAction();
            break;
			case "afficher" :
				return new AfficherAction();
            break;
            case "affActivites":
                return new AffActivitesAction();
            break;
            case "attribuer":
                return new AttribuerAction();
            break;
            case "desattribuer":
                return new DesattribuerAction();
            break;
            case "moveEC":
                return new MoveECAction();
            break;
            case "moveAF":
                return new MoveAFAction();
            break;
            case "moveT":
                return new MoveTAction();
            break;
            case "editTache":
                return new EditTacheAction();
            break;
            case "confirmEditTache":
                return new ConfirmEditTache();
            break;
            case "addTache":
                return new AddTacheAction();
            break;
            case "confirmAddTache":
                return new ConfirmAddTache();
            break;
            case "deleteTache":
                return new DeleteTacheAction();
            break;
            case "setProjet":
                return new setProjetAction();
            break;
            case "addUser":
                return new addUserAction();
            break;
            case "addProjet":
                return new addProjetAction();
            break;
            case "editProjet":
                return new editProjetAction();
            break;
            case "confirmEditPro":
                return new confirmEditProjet();
            break;
            case "deletePro":
                return new deleteProjetAction();
            break;
            case "setModo":
                return new setModoAction();
            break;
            case "setUser": //On utilise deux actions pour set les roles pour eviter des failles
                return new setUserAction();
            break;
            case "kickUser": //On utilise deux actions pour set les roles pour eviter des failles
                return new kickUserAction();
            break;
			default :
				return new DefaultAction();
		}
	}
}
?>