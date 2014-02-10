<?php

$phrase="";
$login=$_POST['login'];
$mdp=$_POST['password'];
$confirm=$_POST['validation'];

$test_mdp=verif($mdp,$confirm);


if($test_mdp==true)
{
	$user= new User($db,$_POST);
	$user=$user->createUser($_POST);
	require ("views/logged.html");
}
else
{
	$phrase="mots de passe incorrect";
	
}



function verif($mdp1,$mdp2)
{
	echo "Fonction verif";
	if($mdp1==$mdp2)
		return true;
	else
		return false;
}



?>
