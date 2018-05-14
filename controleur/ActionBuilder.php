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
require_once('./controleur/AffProfilsAction.php');
require_once('./controleur/ChangerImageAction.php');
require_once('./controleur/ModifierProfilsAction.php');

class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction)
		{
            case "modifierProfils":
                return new ModifierProfilsAction();
                break;
            case "connecter" :
				return new LoginAction();
			break;
			case "changerImage" :
				return new ChangerImageAction();
			break;
            case "affProfils":
                return new AffProfilsAction();
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
			default :
				return new DefaultAction();
		}
	}
}
?>