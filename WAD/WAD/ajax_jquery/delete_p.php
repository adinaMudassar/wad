<?php

$input = $_POST['input'];
$deleteBy = $_POST['deleteBy'];

$con = mysqli_connect('localhost', 'root', '', 'wadassignment');
if($con->connect_error)
{
	die("Connection failed : ".$con->connect_errno);
}
else
{
	if($deleteBy == 1)
		$sql = "Delete from wadtable where name = '$input'";
	if($deleteBy == 2)
		$sql = "Delete from wadtable where roll_number = '$input'";
	if($deleteBy == 3)
		$sql = "Delete from wadtable where cnic = '$input'";
	if($deleteBy == 4)
		$sql = "Delete from wadtable where contact_number = '$input'";
	$res = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)>0)
	{
		echo "Deleted successfully<br>";
	}
	else
	{
		echo "Deletion not successful<br>";
	}
}


?>