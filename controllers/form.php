<?php
	if ($_GET["objet"] == "showform")
		require "views/formSujetAjout.html";
	
	else if ($_POST["objet"] == "sujetaddform")
	{	
		$data = array();
		$data[] = $_POST["titre"];
		$data[] = $_POST["description"];
		$sujet = $manager->CreateSujet($data);
		$save = $sujet->Save();
	}

	else if ($_POST["objet"] == "sujetmodifform")
	{	
		$sujet = $manager->getSujet($id);
		$titre = $sujet->getTitre();
		$titre = $sujet->getDescription();
	}
		

?>