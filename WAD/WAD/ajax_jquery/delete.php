<!DOCTYPE html>
<html>
<head>
	<title> WAD Assignment </title>

	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#delete').click(function(event){
				event.preventDefault();
				var input = document.getElementById("inputD").value;
				var deleteBy = document.getElementById("deleteBy").value;
				$.ajax({
					type: "POST",
					url: "delete_p.php",
					data: {"input": input, "deleteBy": deleteBy},
					success: function(response)
					{
						$("#deleteRes").html(response);
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
		Delete Input: <input type="text" name="input" id="inputD">&nbsp&nbsp&nbsp&nbsp
		Delete By:
		<select id="deleteBy">
			<option value="1">Name</option>
			<option value="2">Roll number</option>
			<option value="3">CNIC</option>
			<option value="4">Contact Number</option>
		</select>&nbsp&nbsp&nbsp&nbsp
		<button type="submit" id="delete">Search</button>
	</form>
	<br><br>
	<div id="deleteRes">
	</div>

</body>
</html>