<!DOCTYPE html>
<html>
<head>
	<title> WAD Assignment </title>

	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#insert').click(function(){
				var name = document.getElementById("name").value;
				var reg = document.getElementById("reg").value;
				var cnic = document.getElementById("cnic").value;
				var contact = document.getElementById("contact").value;
				$.ajax({
					type: "POST",
					url: "index_p.php",
					data: {"name": name, "reg": reg, "cnic": cnic, "contact":contact},
					success: function(response)
					{
						$("#insertRes").html(response);
					}
				});
		});
	});
	</script>

</head>

<body>

	<button class="tablink" onclick="document.location.href = 'index.php'">Insert</button>
	<button class="tablink" onclick="document.location.href = 'search.php'">Search</button>
	<button class="tablink" onclick="document.location.href = 'update.php'">Update</button>
	<button class="tablink" onclick="document.location.href = 'delete.php'">Delete</button>

	<br><br><br><br><br><br>
	<table class="styleTable">
		<tr>
			<td style="text-align: right;">Name: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="name" id="name"></td>
		</tr>
		<tr>
			<td style="text-align: right;">Roll No: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="reg" id="reg"></td>
		</tr>
		<tr>
			<td style="text-align: right;">CNIC: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="cnic" id="cnic"></td>
		</tr>
		<tr>
			<td style="text-align: right;">Contact No: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="contact" id="contact"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" id="insert"> Insert Data</button></td>
		</tr>
	</table>

	<br><br>
	<div id="insertRes">
	</div>

</body>
</html>