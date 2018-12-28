<?php session_start();
	

	if(isset($_GET['id'])){

		$id_trans = $_GET['id'];
	}

?>


<h4>My Ticket / Package</h4>

<table id="datatable" class="table table-hover table-bordered" width="900px">
	<thead>
		<tr style="background-color:#FF6666">
			<th class="text-center">No</th>
			<th class="text-center">Package Name</th>
			<th class="text-center">Package Time</th>
			<th class="text-center">Package Type</th>
			<th class="text-center">Quantity</th>
			<th class="text-center">Price</th>
			<th class="text-center">Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			include "../includes/dbconnect.php";
			$sql=mysqli_query($dbc,"SELECT a.*,b.* FROM booking AS a, package As b WHERE a.transcode = '$id_trans' AND a.Packageid = b.Packageid");
			while($row=mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['Packagename'] ?></td>
				<td><?php echo $row['Packagetime'] ?></td>
				<td><?php echo $row['Packagetype'] ?></td>
				<td><?php echo $row['Ticketquantity'] ?></td>
				<td>RM <?php echo $row['Price'] ?></td>
				<td><?php  $price=$row['Price']; $quantity=$row['Ticketquantity']; $total=$price*$quantity; echo 'RM';echo $total;?></td>
					
			</tr>
			<?php
				$no++;
				}
				?>
	</tbody>
	
</table>

