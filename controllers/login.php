<?php
$user = $manager->GetUser();	// création de l'objet User

	if(isset($_SESSION['login']))
	{
		$log = true;
	}
	else
	{
		$data = $_POST; 						// affectation des valeurs saisies
		$_SESSION['login'] = $data['login'];	// miseen session
					
		$log = $user->VerifLogin($data);		// vérification du login
		var_dump($log);
	}

	if($log === true)
	{
		$login = $user->GetLogin();
		require "views/logged.html";
	}
	else if($log === false)
	{
		$phrase = "Nom d'utilisateur inconnu ou mot de passe incorrect";
		require "views/login_error.html";
	}
?>