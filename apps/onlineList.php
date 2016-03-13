<?php 
$count = 0;
$max =sizeof($list);
while ($count < $max)
{
	$user = $list[$count];
	
	require('views/onlineList.phtml');
	$count++;
}
?>