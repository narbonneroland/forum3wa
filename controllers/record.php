<?php

if (!isset($_POST['login']) || $_POST['login'] == '' ||
	!isset($_POST['password']) || $_POST['password'] == '' ||
	!isset($_POST['validation']) || $_POST['validation'] == '')
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
