<?php

$name = $_POST['name'];
$reg = $_POST['reg'];
$cnic = $_POST['cnic'];
$contact = $_POST['contact'];

$con = mysqli_connect('localhost', 'root', '', 'wadassignment');
if($con->connect_error)
{
	die("Connection failed : ".$con->connect_errno);
}
else
{
	$sql = "Insert into wadtable(Name, roll_number, CNIC, contact_number)
		values ('$name', '$reg', '$cnic', '$contact')";
	$res = mysqli_query($con, $sql);
	if(!$res)
	{
		echo "Data not inserted<br>";
	}
	else
	{
		echo "Data inserted successfully<br>";
	}
}

?>