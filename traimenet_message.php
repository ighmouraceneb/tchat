<?php
	require('models/Message.class.php');
	require('models/MessageManager.class.php');
	$messageManager = new MessageManager($db);
	if (isset($_POST['message']))
	{
		try
		{
			$message = $messageManager->selectLast();
			$i = 0;
			$result ='';
			while (isset($list[$i]))
			{
				$tchat = $list[$i];
				$i++;
			}
		}
		catch (Exception $e)
			{
				$error = $e->getMessage();
			}
	}


?>

