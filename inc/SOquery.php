<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
table {
    background-color: #181818;
}
table, .table {
    color: #fff;
}
</style>

<div class="container">	
	<div class="row">
	    <h2>Unit Lookup</h2>	
            <?php
	            include_once('dbhandler.php');
	            $SOQuery = $_POST["Lookup"];
                $sqlQuery = "SELECT * FROM rack_1 where ServiceOrder = '$SOQuery';";
		        $resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
		    ?>
            <table id="QueryTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Service Order</th>
                        <th>SKU</th>
                        <th>Item Notes</th>
                        <th>Cart</th>
                        <th>Date Ordered</th>													
                    </tr>
                </thead>
                <tbody>
                    <?php while( $developer = mysqli_fetch_assoc($resultSet) ) { ?>
                    <tr id="<?php echo $developer ['id']; ?>">
                    <td><?php echo $developer ['id']; ?></td>
                    <td><?php echo $developer ['ServiceOrder']; ?></td>
                    <td><?php echo $developer ['SKU']; ?></td>
                    <td><?php echo $developer ['Model']; ?></td>
                    <td><?php echo $developer ['Cart']; ?></td>
                    <td><?php echo $developer ['DateOrdered']; ?></td>  				   				   				  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>           
</div>