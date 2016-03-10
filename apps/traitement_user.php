<?php

//traitement inscription au compte//
// require('models/User.class.php');
// require('models/UserManager.class.php');
$userManager = new UserManager($db);
	
if (isset($_POST['login'], $_POST['password1'], $_POST['password2']))
{
			try
	{
		$user = $userManager->create($_POST['login'], $_POST['password1'], $_POST['password2']);
	
		header('Location: home');
		exit;
				
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
}

//traitement connexion au compte//
if (isset($_POST['login'], $_POST['password']))
{
	try
	{
		$manager = new UserManager($db);
		$user = $manager->getByLogin($_POST['login']);
		$user->verifPassword($_POST['password']);
		$_SESSION['id'] = $user->getId();
		$_SESSION['login'] = $user->getLogin();
		header('Location: message');
		exit;
	}
	catch (Exception $e)
	{
				$error = $e->getMessage();

	}
}





 if ($action == 'logout') 
 {
 	try
 	{
	 
	$_SESSION = array();
	session_destroy();
	header('location:home'); 
	exit;
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();

	}
}


?>