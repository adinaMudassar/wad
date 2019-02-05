<?php

$id = $_POST['id'];
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
	$sql = "Select * from wadtable where id='$id'";
	$res = mysqli_query($con, $sql);
	$row = $res->fetch_assoc();
	if($row['name']!=$name || $row['roll_number']!=$reg || $row['CNIC']!=$cnic || $row['contact_number']!=$contact)
	{
		$sql = "Update wadtable
				Set name='$name', roll_number='$reg', CNIC='$cnic', contact_number='$contact'
				where id='$id'";
		$res = mysqli_query($con, $sql);
		if($res)
			echo "Updated successfully<br>";
		else
			echo "Not updated<br>";
	}
	else
		echo "Nothing to update<br>";
}


?>