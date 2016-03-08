traimenet_message<?php
$manager = new TchatManager($link);
if(isset($_POST['submit'])){
	if(!empty($_POST['message'])){
		$tchat = $manager->create($_POST['message']);
	}
	else{
		echo "Veuillez entrer un message";
	}
	exit;
}
else if (isset($_GET['refresh']))
{
	$list = $manager->selectLast();
	$i = 0;
	$res = '';
	while (isset($list[$i]))
	{
		$message = $list[$i];
		require('views/display-tchat.phtml');
		$i++;
	}
	exit;
}
?>