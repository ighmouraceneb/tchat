<?php


//if (isset($_POST['login'], $_POST['password1'], $_POST['password2']))
		// {
// var_dump($_POST);
			// Etape 2
			// $login = $_POST['login'];
			// $password1 = $_POST['password1'];
			// $password2 = $_POST['password2'];
			
			// // Etape 3
			// if (strlen($login) < 3)
			// 	$error = "Login trop court (< 3)";
			// else if (strlen($login) > 31)
			// 	$error = "Login trop long (> 31)";
			// else if (strlen($password1) < 6)
			// 	$error = "Password trop court (< 6)";
			// /* ##PASCAL ~> Pas de verif sur email, phone, employment, first_name, last_name ? attention aux injections SQL ! */
			// else if ($password1 !== $password2)
			// 	$error = "Les mots de passe ne correspondent pas";
			// else
			// {
			// 	$password = $password1;
			// 	// Etape 4
			// 	$login = mysqli_real_escape_string($db, $login);
			// 	$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
			// 	$password = mysqli_real_escape_string($db, $password);

			// 	$query = "INSERT INTO users (login, password) VALUES('".$login."', '".$password."')";
			// 	$res = mysqli_query($db, $query);
			// 	var_dump(mysqli_error($db));
			// 	if ($res)

			// 	{
			// 		// Etape 5
			// 		$_SESSION['id'] = mysqli_insert_id($db);
			// 		$_SESSION['login'] = $login;
					
			// 		$valid = "Votre compte est crée !!!";
				
			// 		header('Location: home');
			// 		exit;
			// 	}
			// 	else
			// 		$error = "Erreur interne au serveur";
			// }
 		// }


//traitement inscription au compte//
		require('models/User.class.php');
		require('models/UserManager.class.php');
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

// 	if (isset($_POST['login'], $_POST['password']))
// {
// 	try
// 	{
// 		$manager = new UserManager($db);
// 		$user = $manager->getByLogin($_POST['login']);
// 		$user->verifPassword($_POST['password']);
// 		$_SESSION['id'] = $user->getId();
// 		$_SESSION['login'] = $user->getLogin();
// 		header('Location: tchat');
// 		exit;
// 	}
// 	catch (Exception $e)
// 	{
// 		$login = $_POST['login'];
// 		$error = $e->getMessage();
// 	}
// }








?>