<?php

	if(isset($_GET["objet"]))
	{
		if ($_GET["objet"] == "showform")
			require "views/formSujetAjout.html";
		
		else if ($_GET["objet"] == "sujetaddform")
		{	
			$data = array();
			$sujet = $manager->CreateSujet($_POST);
			$save = $sujet->Save();
			$id_sujet=$save->getID();
			$id_message=$save->getIdMessage();
			echo $id_message;

		}

		else if ($_GET["objet"] == "sujetmodifform")
		{	
			$sujet = $manager->getSujet($id);
			$titre = $sujet->getTitre();
			$titre = $sujet->getDescription();
		}
	}	

?>