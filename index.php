<?php
	include("obj/dbCon.php");


//prepares SQL statment to get records from db

	$sql = "SELECT * FROM todotasks";
	
	//executes SQL command
	$rec = $conn->query( $sql );

	$num = $rec->num_rows;

	echo $num;

?>
<!DOCTYPE html>
<html>
<head>

	<title> TO DO LIST</title>
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<form id="todoForm" action="processData.php" method="post"> <!--sends form to DB-->
				<input type="text" class="form-control" placeholder="Text input"  id="taskInput" name="taskInput"> <!--name used so PHP know what it's grabbing --> 
				<button type="button" class="btn btn-default" id="actionBtn">BUTT ON</button>
			</form>
		</div>
		<div class="col-md-1"></div>
	</div>
		<div class="row">
			<div class="col-md-12">
				<ul id="taskList"> <!-- PHP script that says for every i less than num of entries, increment 1-->
					<?php
						for($i = 0; $i < $num; $i++){ 
							$row = mysqli_fetch_array($rec);
							echo "<li>".$row['taskName']."</li>";
						}

					?>
				</ul>
			</div>
		</div>
</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script src="js/validator.js"></script>

</body>
</html>
