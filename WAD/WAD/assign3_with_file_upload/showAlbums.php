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
		<form action="home.php" method="POST">
			<button type="submit" class="btn btn-secondary btn-lg">Create Album</button>	
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
	<?php
		$sql = "Select * from album";
		$res = mysqli_query($con, $sql);
		if($res->num_rows == 0)
			echo "<br><br> <h5> No albums found </h5> <br>";
		else
		{
			echo "<table style=\"text-align:center; margin-left: 30px;\">";
			while($row = $res->fetch_assoc())
			{
				echo "<tr>";
				echo "<td>". $row['name'] ."</td>";
				echo "<td> <a href = viewSongs.php?album_name=". $row['name'] ."><img src = ". $row['photo'] ." height='200px'; width='300px';></a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	?>
</div>

</body>
</html>


