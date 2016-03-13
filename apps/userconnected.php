<?php 
$manager = new UserManager($db);
$list = $manager-> getAll();
require('views/userconnected.phtml'); ?>