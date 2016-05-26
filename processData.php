<?php


	include("obj/dbCon.php");

	// echo "Hello";

	$taskName = $_POST['taskInput'];

	//echo $taskName;

	$sql = "INSERT INTO todotasks(taskName) VALUES('".$taskName."')"; //preparing SQL statmenet to enter data into todotasks table

	//echo $sql  to test whether script works

	$rec = $conn->query( $sql ); //sends $sql string into query

	header("Location:index.php"); //redirect back to index




?>