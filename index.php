<?php
$page = "home";
if (isset($_GET['page']))
{
	$page = $_GET['page'];
}
require('apps/skel.php');
?>