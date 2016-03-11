<?php 
$manager = new UserManager($db);
$manager->editDate($_SESSION['id']);



$list = $manager-> getUserConnect();
require('views/userconnected.phtml'); ?>