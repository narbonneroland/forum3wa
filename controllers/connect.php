<?php 
	
	if (isset($_SESSION["username"]))
		require "views/logged.html";
	else
		require "views/login.html";

?>