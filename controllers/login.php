<?php 

	$_SESSION['login']=$_POST['login'];
	$user= new User($db,$_POST);
	$user=$user->selectUser($_POST);
	//echo "<pre>".print_r($user,true)."</pre>";
	
	if($user)
		{

			require "views/logged.html";
			
		}
	else
	{
		$phrase ="Erreur de connection : réessayer ou inscrivez vous";
		require "views/login_error.html";
	}

	
		

?>