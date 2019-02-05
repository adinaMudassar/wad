<!DOCTYPE html>
<html>
<head>
	<title> WAD Assignment </title>

	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#searchU').click(function(event){
				event.preventDefault();
				var input = document.getElementById("inputU").value;
				var searchBy = document.getElementById("searchByU").value;
				$.ajax({
					type: "POST",
					url: "update_p.php",
					data: {"input": input, "searchBy": searchBy},
					success: function(response)
					{
						values = response.split(',');
						document.getElementById("id").value = values[4];
						document.getElementById("nameU").value = values[0];
						document.getElementById("regU").value = values[1];
						document.getElementById("cnicU").value = values[2];
						document.getElementById("contactU").value = values[3];
					}
				});
		});

			$('#update').click(function(event){
				event.preventDefault();
				var id = document.getElementById("id").value;
				var name = document.getElementById("nameU").value;
				var reg = document.getElementById("regU").value;
				var cnic = document.getElementById("cnicU").value;
				var contact = document.getElementById("contactU").value;
				$.ajax({
					type: "POST",
					url: "update_p2.php",
					data: {"id": id, "name": name, "reg": reg, "cnic": cnic, "contact":contact},
					success: function(response)
					{
						$("#updateRes").html(response);
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

		<form>
		Search Input: <input type="text" name="input" id="inputU">&nbsp&nbsp&nbsp&nbsp
		Search By:
		<select id="searchByU">
			<option value="1">Name</option>
			<option value="2">Roll number</option>
			<option value="3">CNIC</option>
			<option value="4">Contact Number</option>
		</select>&nbsp&nbsp&nbsp&nbsp
		<button type="submit" id="searchU">Search</button>
	</form>
	<br><br>

	<table class="styleTable">
		<tr>
			<td style="text-align: right;"></td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="hidden" name="id" id="id" value=""></td>
		</tr>
		<tr>
			<td style="text-align: right;">Name: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="name" id="nameU" value=""></td>
		</tr>
		<tr>
			<td style="text-align: right;">Roll No: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="reg" id="regU"></td>
		</tr>
		<tr>
			<td style="text-align: right;">CNIC: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="cnic" id="cnicU"></td>
		</tr>
		<tr>
			<td style="text-align: right;">Contact No: </td>
			<td>&nbsp&nbsp&nbsp&nbsp</td>
			<td><input type="text" name="contact" id="contactU"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" id="update"> Update Data</button></td>
		</tr>
	</table>

	<br><br>
	<div id="updateRes">
	</div>

</body>
</html>