<?php
	require_once("db.php");
	session_start();

	if(count($_GET) > 0)
		$album = $_GET['album_name'];
	if(count($_POST) > 0)
		$album_name = $_POST['album_name'];

	if(!isset($_SESSION['user']) || empty($_SESSION['user']))
		header("location: login.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Soundcloud</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap4.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap4.css">
</head>
<body>

	<div class="container-fluid topbar">
	<div style="display: inline-block;">
		<img src="image/soundcloud.jpg" style="height: 50px; width: 120px;">
	</div>
	<div style="display: inline-block;">
		<button type="button" class="btn btn-secondary btn-lg">Home</button>		
	</div>
	<div style="display: inline-block;">
		<button type="button" class="btn btn-secondary btn-lg">Stream</button>		
	</div>
	<div style="display: inline-block;">
		<button type="button" class="btn btn-secondary btn-lg">Collection</button>		
	</div>	
	<div style="display: inline-block;">
		<input class="search_input" type="text" name="" placeholder="Search...">
        <a href="#" class="search_icon"><i class="fa fa-search icon"></i></a>
	</div>
	<div style="display: inline-block; float: right;">
		<form action="logout.php" method="POST">
			<button type="submit" class="btn btn-secondary btn-lg">Logout</button>	
		</form>
	</div>	
	<div style="display: inline-block; float: right;">
		<form action="addSong.php" method="POST">
			<input type="hidden" name="album_name" value=<?php if(isset($album_name)) echo $album_name; else echo $album; ?>>
			<button type="submit" class="btn btn-secondary btn-lg">Add Song</button>
		</form>
	</div>
</div>

<div style="text-align: center; font-size: 30px;">
	<?php
		if(isset($_GET["userMsg"]))
			echo $_GET["userMsg"];
	?>
</div>

<br><br>
<div class="container">

</div>

</body>
</html>


