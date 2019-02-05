<?php
	require_once("db.php");
	session_start();

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
		<form action="showAlbums.php" method="POST">
			<button type="submit" class="btn btn-secondary btn-lg">View Albums</button>	
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
<div class="outer">
	<div class="inner">
		<h5 style="text-align: center;">ALBUM</h5><br>
		<form action="upload_album.php" method="POST" style="text-align: center;" enctype="multipart/form-data">
			<input style="width: 250px" type="text" name="album_name" placeholder="Enter name of Album" required value="<?php if(isset($_GET['album_name'])) echo $_GET['album_name']; ?>"><br><br>
			<b>Choose Album Photo</b>
			<input style="width: 250px" type="file" name="album_photo" required><br><br>
			<button style="background-color: orange; width: 200px" type="submit"> Create Album </button>
		</form>
	</div>
</div>
</div>



</body>
</html>


