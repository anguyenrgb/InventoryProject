<?php
	include_once("dbhandler.php");

	$SO = ($_POST['SO']);
	$SKU = ($_POST['SKU']);
	$Model = ($_POST['ItemNotes']);
	$Cart = ($_POST['Cart']);
	$DateOrdered = ($_POST['Date']);

	$sql = "INSERT INTO rack_1 (ServiceOrder, SKU, Model, Cart, DateOrdered) VALUES ('$SO', '$SKU', '$Model', '$Cart', '$DateOrdered');";
	mysqli_query($conn, $sql);

	header("Location: http://localhost/CheckIn.php");
	exit();
?>
	