<?php // modèle MVC2
header('Content-Type: text/html; charset=utf8_bin');

require_once 'models/ForumManager.class.php';

session_start();

if(!isset($_SESSION['created']))
{
	init_session();
}

function init_session()
{
	$_SESSION['login']="";
	$_SESSION['created']=true;
}

$db = mysqli_connect('127.0.0.1','root','coucou','forum');

if ($db === false)
	die("erreur de connexion à la base MySQL");

$manager = new ForumManager($db);

$content = 'controllers/content.php';

if (isset($_GET['page']))
{	
	$content = 'controllers/'.$_GET['page'].'.php';
}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']))
	require($content);
else 
	require('controllers/skel.php');
?>