<?php

if (!isset($_POST['login']))
{
	require "views/login.html";
}

else
{
	$user = new User ($db, $_POST);

	if ($user->VerifLogin())
	{
		$login = $user->getLogin();
		$id = $user->getID();
		$_SESSION['login'] = $user->getLogin();
		require "views/logged.html";
	}
	else 
	{
		$phrase = "Identifiant ou mot de passe incorrect";
		require "views/login_error.html";
	}
}

?>