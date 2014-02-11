<?php

if (!isset($_POST['login']) || trim($_POST['login']) == '' ||
	!isset($_POST['password']) || trim($_POST['password']) == '' ||
	!isset($_POST['validation']) || trim($_POST['validation']) == '')
{
	echo "ERR-INVALID-POST";
}
else
{
	if($_POST['password'] == $_POST['validation'])
	{
		$user= new User ($db,$_POST);
		if ($user->loginExists())
			echo "ERR-USER-ALREADY-EXISTS";
		else
		{
			$user=$user->saveUser($_POST);
			require ("views/logged.html");
		}
	}
	else
	{
		echo "ERR-INVALID-PASSWORD";		
	}
}
?>