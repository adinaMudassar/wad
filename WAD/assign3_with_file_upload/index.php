<?php
	require_once("db.php");

	if(count($_POST) > 0)
	{
		$name = $_POST['name'];
		$pswd = $_POST['pswd'];
		$email = $_POST['email'];

		$pattern = "/[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,3}/";
		if(preg_match("$pattern", $email) && strlen($pswd)>=6)
		{

			$sql = "Select * from users where email = '$email'";
			$res = mysqli_query($con, $sql);
			if($res->num_rows == 0)
			{
				$sql = "INSERT INTO users(name, email, password)
						Values ('$name', '$email', '$pswd')";
				$res = mysqli_query($con, $sql);
				$current_id = mysqli_insert_id($con);
				if(!empty($current_id))
					$msg = "Registered";
				else
					$msg = "Unable to register";
			}
			else
				$msg = "An account already exists on this email id";
		}
		else if(strlen($pswd)<6)
			$msg = "Password is too short";
		else
			$msg = "Invalid email";

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
			if(document.getElementById("name").value=="" || document.getElementById("eml").value=="" || document.getElementById("pswd").value=="" || document.getElementById("pswd_").value=="")
			{
				alert("No input field should be empty");
				return false;
			}

			if(document.getElementById("pswd").value == document.getElementById("pswd_").value)
				return true;
			else
			{
				alert("Please verify your password correctly...");
				return false;
			}
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
		<h5 style="text-align: center;">Signup</h5>
		<form action="" method="POST" style="text-align: center;" onsubmit="return validate();">
			<input type="text" name="name" id="name" placeholder="Your name" required><br>
			<input type="text" name="email" id="eml" placeholder="Your email" required><br>
			<input type="password" name="pswd" id="pswd" placeholder="Your password" required><br>
			<input type="password" name="pswd_" id="pswd_" placeholder="Confirm password" required><br><br>
			<button style="background-color: orange; width: 200px" type="submit"> Continue </button>
		</form>
	</div>
</div>
</div>
<br><br>
</body>
</html>