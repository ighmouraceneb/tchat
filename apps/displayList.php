<?php
$manager = new MessageManager($db);
$list = $manager->getAll();
$count = 0;
$max = sizeof($list);
while ($count < $max)
{
	$message = $list[$count];
	require('views/message_unitaire.phtml');
	$count++;
}
?>