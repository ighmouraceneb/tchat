<?php
	if (isset($_SESSION['id'], $_SESSION['login'])) {
		
		require('views/headerConnecter.phtml');	
	}
	 else {
		require('views/header.phtml');
	}
?>