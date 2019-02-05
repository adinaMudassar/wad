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
		echo "<table border=1px solid black; style=\"text-align:center; margin-left: 30px;\">

		<th style=\"width: 80px;\"> Name </th>
		<th style=\"width: 80px;\"> Reg No </th>
		<th style=\"width: 80px;\"> CNIC </th>
		<th style=\"width: 80px;\"> Contact </th>
		";
		while($row = $res->fetch_assoc())
		{
			echo "<tr>";
			echo "<td width: 80px>" .$row['name']. "</td>";
			echo "<td width: 80px>" .$row['roll_number']. "</td>";
			echo "<td width: 80px>" .$row['CNIC']. "</td>";
			echo "<td width: 80px>" .$row['contact_number']. "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "No record found";
	}
}


?>