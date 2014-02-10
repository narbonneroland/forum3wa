<?php

if (!isset($_POST['login']))
{
	require "views/login.html";
}

else
{
	$user = new User ($db, $_POST);

	if ($user->VerifLogin($_POST))
	{
		$login = $user->GetLogin();
		require "views/logged.html";
	}
	else 
	{
		$phrase = "Nom d'utilisateur inconnu ou mot de passe incorrect";
		require "views/login_error.html";
	}
}

?>