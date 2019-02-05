<?php
	require_once("db.php");
	session_start();

	if(!isset($_SESSION['user']) || empty($_SESSION['user']))
		header("location: login.php");

	if(empty($_POST['name']) || empty($_FILES['photo']) || empty($_FILES['audio']))
		header("location: addSong.php");

	

?>