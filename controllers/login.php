<?php 

	$_SESSION['login']=$_POST['login'];
	var_dump($_POST);
	$_SESSION['login']="toto";
	if (isset($_SESSION["login"]) || $_SESSION['login']!="")
		{

			require "views/logged.html";
		}
		
	else
		{
			require "views/login.html";
		}
		

?>