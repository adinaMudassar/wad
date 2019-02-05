<?php
	require_once("db.php");
	if(count($_POST) > 0)
	{
		$pswd = $_POST['pswd'];
		$email = $_POST['email'];

		$pattern = "/[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,3}/";
		if(preg_match($pattern, $email))
		{
			$sql = "Select* from users where email='$email' and password='$pswd'";
			$res = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($res);
			session_start();
			$_SESSION['user'] = $email;

			if($row > 0)
				header("location: home.php");
			else
				$msg = "Login Not successful.";			
		}
		else
			$msg = "Enter a valid email id";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Soundcloud </title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap4.css">

	<script type="text/javascript">
		function validate()
		{
			if(document.getElementById("email").value=="" || document.getElementById("pswd").value=="")
			{
				alert("No input field should be empty");
				return false;
			}
			else
				return true;
		}
	</script>
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
		<button type="button" class="btn btn-secondary btn-lg" onclick="document.location.href = 'login.php'">Login</button>		
	</div>	
	<div style="display: inline-block; float: right;">
		<button type="button" class="btn btn-secondary btn-lg" onclick="document.location.href = 'index.php'">SignUp</button>		
	</div>
</div>

<div style="text-align: center; font-size: 30px;">
	<?php
		if(isset($msg))
			echo $msg;
	?>	
</div>

<br><br>
<div class="container">
<div class="outer">
	<div class="inner">
		<h5 style="text-align: center;">Login</h5>
		<form action="" method="POST" style="text-align: center;" onsubmit="return validate();">
			<input style="width: 200px;" type="text" name="email" id="email" placeholder="Your email address" required><br>
			<input style="width: 200px;" type="password" name="pswd" id="pswd" placeholder="Your password" required><br><br>
			<button style="width: 200px; background-color: orange;" type="submit"> Continue </button>
		</form>
	</div>
</div>

</div>

</body>
</html>