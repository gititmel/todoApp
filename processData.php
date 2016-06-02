<?php


	include("obj/dbCon.php");

	// echo "Hello";
	$actionType = $_POST['actionType'];
	switch( $actionType ){
		case "update":
				$taskID 	= $_POST['taskID'];
				$taskStatus = $_POST['taskStatus'];

				$sql = "UPDATE todotasks SET taskStatus = ".$taskStatus." WHERE taskID ="
					.$taskID;
				$rec = $conn->query( $sql );

//prepare array for response
				$arr['status'] = "update complete";
				$arr['taskID'] = $taskID;

			break;
		case "insert":
				$taskName = $_POST["taskInput"];
				$sql = "INSERT INTO todotasks(taskName) VALUES('".$taskName."')"; //preparing SQL statmenet to enter data into todotasks table

				//echo $sql  to test whether script works

				$rec = $conn->query( $sql ); //sends $sql string into query

				header("Location:index.php"); //redirect back to index
			break;
		case "select":
			break;
		case "delete":
				$taskID 		= $_POST['taskID'];
 				$sql = "DELETE FROM todotasks WHERE taskID = ".$taskID;
 				$rec = $conn->query( $sql );
 				$arr['status'] = "delete complete";
 				$arr['taskID'] = $taskID;
			break;

	}

	echo json_encode( $arr ); // returns array as string



	// $taskName = $_POST['taskInput'];


	//echo $taskName;

	

?>