<?php

	session_start();

	if(!isset($_SESSION['user']) || empty($_SESSION['user']))
		header("location: login.php");

	session_unset();
	session_destroy();
	header("location: login.php");

?>