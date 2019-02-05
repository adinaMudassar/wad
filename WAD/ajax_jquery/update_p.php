<?php

$input = $_POST['input'];
$searchBy = $_POST['searchBy'];

$con = mysqli_connect('localhost', 'root', '', 'wadassignment');
if($con->connect_error)
{
	die("Connection failed : ".$con->connect_errno);
}
else
{
	if($searchBy==1)
		$sql = "SELECT * FROM wadtable where name='$input'";
	if($searchBy==2)
		$sql = "SELECT * FROM wadtable where roll_number='$input'";
	if($searchBy==3)
		$sql = "SELECT * FROM wadtable where CNIC='$input'";
	if($searchBy==4)
		$sql = "SELECT * FROM wadtable where contact_number='$input'";
	$res = mysqli_query($con, $sql);
	if($res->num_rows > 0)
	{
		while($row = $res->fetch_assoc())
		{
			echo $row['name'] . "," . $row['roll_number'] . "," . $row['CNIC'] . "," . $row['contact_number'] . "," . $row['id'];
		}
	}
	else
	{
		echo "No record found";
	}
}


?>