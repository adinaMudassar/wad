<?php
	require_once("db.php");
	session_start();

	if(!isset($_SESSION['user']) || empty($_SESSION['user']))
		header("location: login.php");

	if(empty($_POST['album_name']) || empty($_FILES['album_photo']))
		header("location: home.php");

	$uploadOk = 1;
	$album_name = $_POST['album_name'];
	$targetDir = "album_photos/";
	$album_photo = $targetDir .time(). "-". basename($_FILES['album_photo']['name']);
	$photo_type = strtolower(pathinfo($album_photo, PATHINFO_EXTENSION));

	echo $photo_type;
	// Check if image is real or fake
	$check = getimagesize($_FILES['album_photo']['tmp_name']);
	if($check === false)
	{
		$uploadOk = 0;
		header("location: home.php?userMsg='Upload a real image'&album_name=$album_name");
	}

	// Check if file already exists in the directory
	else if(file_exists($album_photo))
	{
		$uploadOk = 0;
		header("location: home.php?userMsg='Sorry, file already exists'&album_name=$album_name");
	}

	// Check that the size of image should be less than 500KB (i.e. 500,000 B)
	else if($_FILES['album_photo']['size'] > 500000)
	{
		$uploadOk = 0;
		header("location: home.php?userMsg='File is too large'&album_name=$album_name");
	}

	// Check file type
	else if($photo_type!="jpg" && $photo_type!="png" && $photo_type!="jpeg")
	{
		$uploadOk = 0;
		header("location: home.php?userMsg='Choose jpg, png or jpeg format'&album_name=$album_name");
	}

	if ($uploadOk == 1) 
	{
		if(!move_uploaded_file($_FILES['album_photo']['tmp_name'], $album_photo))
			header("location: home.php?userMsg='Error in uploading file'&album_name=$album_name");
		else
		{
			$sql = "Select * from album where name='$album_name'";
			$res = mysqli_query($con, $sql);
			if($res->num_rows > 0)
				header("location: home.php?userMsg='Album already exists'&album_name=$album_name");
			else
			{
				$sql = "Insert into album (name, photo)
						values ('$album_name', '$album_photo');";
				$res = mysqli_query($con, $sql);
				$current_id = mysqli_insert_id($con);
				if(!empty($current_id))
					header("location: home.php?userMsg='Album created'");
				else
					header("location: home.php?userMsg='Unable to create album in database'&album_name=$album_name");
			}
		}
	}

?>