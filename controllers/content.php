<?php
if ($db != false)
{
	// AFFICHER LISTE DES THEMES (par défaut ou clic sur accueil)
	if (!isset($_GET["cat"]) || $_GET["cat"] == "theme")
	{
		$id = 'NULL'; // on set la variable à NULL pour l'affichage sans clic
		// le traitement sera fait dans le ForumManager
		// on a besoin d'un getTheme avec un paramètre pour l'affichage du Titre du thème
		$theme = $manager->getTheme($id);

		require 'views/contentHeadTheme.html';
		$i = 0;
		while(isset($theme[$i]))
		{
			$id = $theme[$i]->getID();
			$titre = $theme[$i]->getTitre();
			$theme[$i]->setNbreSujets($id);
			$nbrsujet = $theme[$i]->getNbrSujet();
			$theme[$i]->setNbreMessages($id);
			$nbrmsg = $theme[$i]->getNbrMsg();
			$theme[$i]->setDernierMessage($id);
			$auteur=$theme[$i]->getNomAuteur();
			$date=$theme[$i]->getDatecreation();
			$titre_sujet=$theme[$i]->getTitreSujet();
			require 'views/contentTheme.html';
		$i++;
		}
		require 'views/contentFootTheme.html';
	}

	// AFFICHER LISTE DES SUJETS (clic sur un thème)
	if (isset($_GET["cat"]) && $_GET["cat"] == "sujet")
	{
		$id = $_GET["id_theme"];
		$test = false;
		$sujet = $manager->getSujet($id,$test);

		// on récupère le thème car on a besoin du titre
		$theme = $manager->getTheme($id);
		$path_theme = $theme->getTitre();
		$id_theme = $theme->getID();
		
		require 'views/contentHeadSujet.html';
		$i = 0;
		while(isset($sujet[$i]))
		{
			$id = $sujet[$i]->getID();
			$titre = $sujet[$i]->getTitre();
			$description = $sujet[$i]->getDescription();
			$sujet[$i]->setNbreReponse($id);
			$rep=$sujet[$i]->getNbrRep();
			$sujet[$i]->setDernierMessage($id);
			$auteur=$sujet[$i]->getNomAuteur();
			$view = $sujet[$i]->getNbrView();
			$date = $sujet[$i]->getDatecreation();
			require 'views/contentSujet.html';
		$i++;
		}
		require 'views/contentFootSujet.html';
	}

	// AFFICHER LISTE DES MESSAGES (clic sur un sujet)
	if (isset($_GET["cat"]) && $_GET["cat"] == "message")
	{
		$id = $_GET["id_sujet"];
		$message = $manager->getMessage($id);
		//$path_sujet = $sujet->getPathSujet();/*$path_theme.' > '.*/

		// on récupère le sujet car on a besoin du titre
		$test = true;
		$sujet = $manager->getSujet($id,$test);
		// le titre du sujet
		$path_sujet = $sujet->getTitre();
		// le titre du theme
		$path_theme = $sujet->getPath();
		// les id nécessaires au clic
		$id_sujet = $sujet->getID();
		$id_theme = $sujet->getIdTheme();

		require 'views/contentHeadMessage.html';
		$i = 0;
		while(isset($message[$i]))
		{

			$id_user =$message[$i]->getAuteur();
			$message[$i]->setUser($id_user);
			$message[$i]->setNbreMessage($id_user);
			$nbrMessage=$message[$i]->getNbreMessage();
			$user = $message[$i]->getNomAuteur();
		
			$statut = $message[$i]->getStatut();
		
			$content = $message[$i]->getContenu();
			$date = $message[$i]->getDatecreation();
			require 'views/contentMessage.html';
		$i++;
		}
		$pluriel="";
		if($i>1)
			$pluriel="s";
		require 'views/contentFootMessage.html';
	}
}
?>