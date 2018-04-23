<?php
require_once('./modele/classes/Taches.php');
require_once('./modele/TacheDAO.php');
$TacheDao = new TacheDAO();
/* changer sa avec les sessions*/
$currentProjet = "1";
if (!ISSET($_SESSION)) {session_start();}
if (!ISSET($_SESSION["connecte"])){$_SESSION["connecte"]= false;}
if (!ISSET($_SESSION["current_user"])){$_SESSION["current_user"]= "";}
$_SESSION["currentProjet"] = "Projet 1";
$_SESSION["numProjet"] = 1;
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