<?php
	include_once 'dbhandler.php';

	$Drop = $_POST['Drop'];
	
	$sql = "Delete from rack_1 where id = '$Drop'";
	
	mysqli_query($conn, $sql);

    header("Location: http://localhost/CheckIn.php");
	exit();

	