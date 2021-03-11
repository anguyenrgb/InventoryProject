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
<div class="container">	
	<div class="row">
		<h2>AWP Inventory</h2>		
		
		<!-- {Looking up a Unit} -->
		<form action="inc/SOquery.php" method="POST">   
            <div class="form-group">
                <label for="Lookup">Lookup Unit</label>
                <input type="text" class="form-control" name="Lookup" aria-describedby="LookupHelp" placeholder="Enter SO#">
            </div>
            <button type="submit" class="btn btn-primary">Lookup</button>
        </form>
		<br>
		
		<?php
		include_once("inc/dbhandler.php");
		$sqlQuery = "SELECT COUNT(*) from rack_1;";
		$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
		
		?>
		<table id="CountTable" table style="width: auto;" class="table table-bordered">
			<thead>
				<tr>
					<th>Total AWP</th>												
				</tr>
			</thead>
			<tbody>
			<?php while( $developer = mysqli_fetch_assoc($resultSet) ) { ?>
				   <td><?php echo $developer ['COUNT(*)']; ?></td>
			<?php } ?>
			</tbody>
		</table>
		
		<!-- {Displaying Curent Inventory} -->
		<?php
		include_once("inc/dbhandler.php");
		$sqlQuery = "SELECT * from rack_1 ORDER BY id desc;";
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
					<th>DateOrdered</th>
					<th>PartType</th>
					<th>Issue</th>													
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