<?php




session_start();

$db = @mysqli_connect("localhost", "root", "troiswa", "tchatchatchat");

$page = "home";
$access_page = ['home'];
$access_page_log = [ 'profil', 'message' ];


if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access_page))
	{
		$page = $_GET['page'];
	} 
	elseif (isset($_SESSION['id'])) 
	{
		if (in_array($_GET['page'], $access_page_log))
		{
			$page = $_GET['page'];
		}
	}
	else
	{
		 ##PASCAL ~> Au lieu de mettre l'index.php dans vos redirections vous pouvez mettre votre page par défaut, c'est plus propre : home 
		header('Location: home');
		exit;
	}
}

$error = '';
$traitements_action =  array(
	'login'=>'user',
	'register'=>'user'
);
// var_dump($_POST);
// exit;
if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if (isset($traitements_action[$action])) {
		$value = $traitements_action[$action];
		require('apps/traitement_'.$value.'.php');
	}
	 
}

require('apps/skel.php');





?>