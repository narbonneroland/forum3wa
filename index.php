<?php // modèle MVC2
header('Content-Type: text/html; charset=utf8_bin');

session_start();

if(!isset($_SESSION['created']))
{
	init_session();
}

function init_session()
{
	$_SESSION['Login']="";
	$_SESSION['created']=true;
}

$db = mysqli_connect('127.0.0.1','root','troiswa','forum');

if ($db == false)
	die("erreur de connexion à la base MySQL");

$content = 'controlers/content.php';

if (isset($_GET['page']))
{	
	$content = 'controlers/'.$_GET['page'].'.php';
}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']))
	require($content);
else 
	require('controlers/skel.php');
?>