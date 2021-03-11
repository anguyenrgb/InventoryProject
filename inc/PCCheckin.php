<?php
	include_once("dbhandler.php");

	$SO = ($_POST['SO']);
	$SKU = ($_POST['SKU']);
	$Model = ($_POST['ItemNotes']);
	$Cart = ($_POST['Cart']);
	$DateOrdered = ($_POST['Date']);
	$PartType = ($_POST['PartType']);
	$Issue = ($_POST['Issue']);

	$sql = "INSERT INTO rack_1 (ServiceOrder, SKU, Model, Cart, DateOrdered, PartType, Issue) VALUES ('$SO', '$SKU', '$Model', '$Cart', '$DateOrdered', '$PartType', '$Issue');";
	mysqli_query($conn, $sql);

	header("Location: http://localhost/CheckIn.php");
	exit();
?>
	