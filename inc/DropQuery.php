<?php
	include_once 'dbhandler.php';

	$Drop = $_POST['Drop'];
	
	$sql = "INSERT INTO repaired SELECT * FROM rack_1 WHERE id = '$Drop';
			DELETE FROM rack_1 WHERE id = '$Drop';";
	
	mysqli_multi_query($conn, $sql);

    header("Location: http://localhost/CheckIn.php");
	exit();

	