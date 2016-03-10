<?php


//traitement inscription au compte//

$messageManager = new MessageManager($db);
if (isset($_POST['content'], $_SESSION['id']))
{
	try
	{
		$manager = new UserManager($db);
		$user = $manager->getById($_SESSION['id']);
		$content = $messageManager->create($_POST['content'], $user);
	
		header('Location: message');
		exit;
				
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
}












// $manager = new TchatManager($link);
// if(isset($_POST['submit'])){
// 	if(!empty($_POST['message'])){
// 		$tchat = $manager->create($_POST['message']);
// 	}
// 	else{
// 		echo "Veuillez entrer un message";
// 	}
// 	exit;
// }
// else if (isset($_GET['refresh']))
// {
// 	$list = $manager->selectLast();
// 	$i = 0;
// 	$res = '';
// 	while (isset($list[$i]))
// 	{
// 		$message = $list[$i];
// 		require('views/display-tchat.phtml');
// 		$i++;
// 	}
// 	exit;
// }
 ?>