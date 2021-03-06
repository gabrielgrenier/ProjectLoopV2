<?php
require_once('./modele/classes/Taches.php');
require_once('./modele/classes/Projets.php');
require_once('./modele/classes/User.php');
require_once('./modele/classes/Alert.php');
require_once('./modele/TacheDAO.php');
require_once('./modele/ProjetDAO.php');
require_once('./modele/UserDAO.php');
$TacheDao = new TacheDAO();
$ProjetDao = new ProjetDAO();
$UserDao = new UserDAO();
/* changer sa avec les sessions*/
$currentProjet = "1";
if (!ISSET($_SESSION)) {session_start();}
if (!ISSET($_SESSION["connecte"])){$_SESSION["connecte"]= false;}
if (!ISSET($_SESSION["current_user"])){$_SESSION["current_user"]= "";}
if (!ISSET($_SESSION["current_email"])){$_SESSION["current_email"]= "";}
if (!ISSET($_SESSION["current_projet"])){$_SESSION["current_projet"]= "";}
if (!ISSET($_SESSION["numProjet"])){$_SESSION["numProjet"]= "";}
if (!ISSET($_SESSION["alert"])){$_SESSION["alert"]= new Alert();}
require_once('./controleur/ActionBuilder.php');
if (ISSET($_REQUEST["action"]))
	{
		$vue = ActionBuilder::getAction($_REQUEST["action"])->execute();
	}
else	
	{
		$action = ActionBuilder::getAction("");
		$vue = $action->execute();
	}
include_once('vues/'.$vue.'.php');
?>