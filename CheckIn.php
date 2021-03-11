<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<title>Inventory</title>
<?php include('inc/container.php');?>
<style>
table {
    background-color: #181818;
}
table, .table {
    color: #fff;
}
</style>

<!-- {Input forms} -->
<div class="container">	
	<div class="row">
		<h2>Check In</h2>		
		<form action="inc/PCCheckin.php" method="POST">
            <div class="form-group">
                <label for="SO#">Service Order #</label>
                <input type="text" class="form-control" name="SO" aria-describedby="soHelp" placeholder="Enter SO#">
            </div>
            
                <div class="form-group">
                <label for='PartType'>Part Type:</label>
                <select class="form-control" name='PartType'>
                    <option selected>Choose Part Type</option>
                    <option value="1">RAM</option>
                    <option value="2">Motherboard</option>
                    <option value="3">Case</option>
                    <option value="4">PSU</option>
                </select>
                </div>
                <div class="form-group">
                <label for='Issue'>Issue:</label>
                <select class="form-control" name='Issue'>
                    <option selected>Choose Issue</option>
                    <option value="1">Not working</option>
                    <option value="2">No power</option>
                    <option value="3">Physical Damage</option>
                    <option value="4">Crashing</option>
                </select>
                </div>
            
            <div class="form-group">
                <label for="SKU">SKU #</label>
                <input type="text" class="form-control" name="SKU" placeholder="SKU#">
            </div>
            <div class="form-group">
                <label for="ItemNotes">Item Notes</label>
                <input type="text" class="form-control" name="ItemNotes" placeholder="Item Notes">
            </div>
            <div class="form-group">
                <label for="Cart">Cart</label>
                <input type="text" class="form-control" name="Cart" placeholder="Cart #">
            </div>
            <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" class="form-control" name="Date" placeholder="Date">
            </div>
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>	
        
        <!-- {Removing a unit from current inventory table and moving to repaired table} -->
        <h2>Check Out</h2>
        <form action="inc/DropQuery.php" method="POST">   
            <div class="form-group">
                <label for="drop">ID Number</label>
                <input type="text" class="form-control" name="Drop" aria-describedby="dropHelp" placeholder="Enter id">
            </div>
            <button type="submit" class="btn btn-primary">Check Out</button>
        </form>
        
        <br>
        
        <!-- {Displaying newest entries to check inputs} -->
        <?php
		include_once("inc/dbhandler.php");
		$sqlQuery = "SELECT * from rack_1 ORDER BY id desc LIMIT 10;";
		$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
		?>
		<table id="MasterTable" class="table table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>ServiceOrder</th>
					<th>SKU</th>
					<th>Item Notes</th>	
                    <th>Cart</th>
                    <th>Date Ordered</th>
                    <th>Part Type</th>
                    <th>Issue</th>												
				</tr>
			</thead>
			<tbody>
				<?php while( $developer = mysqli_fetch_assoc($resultSet) ) { ?>
				   <td><?php echo $developer ['id']; ?></td>
				   <td><?php echo $developer ['ServiceOrder']; ?></td>
				   <td><?php echo $developer ['SKU']; ?></td>
				   <td><?php echo $developer ['Model']; ?></td>  
                   <td><?php echo $developer ['Cart']; ?></td>
                   <td><?php echo $developer ['DateOrdered']; ?></td>
                   <td><?php echo $developer ['PartType']; ?></td>
                   <td><?php echo $developer ['Issue']; ?></td>				   				   				  
				   </tr>
				<?php } ?>
			</tbody>
		</table>	
  </div>
</div>

<div class="insert-post-ads1" style="margin-top:20px;">
</div>
</div>
</body>
</html>