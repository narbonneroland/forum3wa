<?php 


	
	if (isset($_SESSION["login"]))
		{
			require "views/logged.html";
		}
		
	else
		{
			require "views/login.html";
		}
		

?>