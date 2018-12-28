<?php include "array_column.php";?>
<?php

	extract($_GET);
	$_SESSION['Transcode'];

	if(!empty($_SESSION["shopping_cart"] )){

		$bil = 0;
		foreach ($_SESSION["shopping_cart"] as &$val1)
		{
		    $bil += $val1["Package_quantity"];   
		}
	}

	if(isset($_POST["add_to_cart"]))
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$item_array_id = array_column($_SESSION["shopping_cart"], "id_package",'');
			if(!in_array($_GET["id"], $item_array_id))
			{
				$count = count($_SESSION["shopping_cart"]);
				$item_array = array(
					'id_package'         => $_GET["id"],
					'Packagename'       => $_POST["hidden_name"],
					'Price'      => $_POST["hidden_price"],
					'Package_quantity'   => $_POST["quantity"]
				);

				$_SESSION["shopping_cart"][$count] = $item_array;
				echo '<script>window.location="createbooking.php"</script>';

			}
			else
			{
				$count = count($_SESSION["shopping_cart"]);
				foreach ($_SESSION["shopping_cart"] as &$val)
				{
				    if ($val["id_package"] == $_GET['id']) {
				        $val["Package_quantity"] += $_POST["quantity"];
				    }
				}
				echo '<script>window.location="createbooking.php"</script>';
			}
		}
		else
		{
			$item_array = array(
				'id_package'         => $_GET["id"],
				'Packagename'       => $_POST["hidden_name"],
				'Price'      => $_POST["hidden_price"],
				'Package_quantity'   => $_POST["quantity"]
			);

			$_SESSION["shopping_cart"][0] = $item_array;
			echo '<script>window.location="createbooking.php"</script>';
		}
	}
	
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "delete")
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($values["id_package"] == $_GET["id"])
				{
					unset($_SESSION["shopping_cart"][$keys]);
					echo '<script>window.location="createbooking.php"</script>';	
				}
			}
		}
	}
?>

<div class="modal fade" id="myModalcart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content modal-info">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
		</div>
		<div class="modal-body modal-spa">
			<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h4><br>
			<table id="datatable" class="table table-hover table-bordered">
				<thead>
					<tr style="background-color:#FF6666 !important">
						<th class="text-center">Package Name</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Price</th>
						<th class="text-center">Total</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
				?>
						<tr>
							<td align="left"><?php echo $values["Packagename"]; ?></td>
							<td><?php echo $values["Package_quantity"]; ?></td>
							<td>RM <?php echo $values["Price"]; ?></td>
							<td>RM <?php echo number_format($values["Package_quantity"] * $values["Price"], 2); ?></td>
							<td><a href="createbooking.php?action=delete&id=<?php echo $values["id_package"]; ?>"><span class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i>Remove</span></a></td>
						</tr>
						<?php
							$total = $total + ($values["Package_quantity"] * $values["Price"]);
						}
						?>
						<tr>
							<td colspan="3" align="right">Total</td>
							<td align="right">RM <?php echo number_format($total, 2); ?></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="5" align="center">
								<form method="post" action="invoiceview.php">
									<input type="submit" name="place_order" class="btn btn-info" value="Place Order" />
									<input type="hidden" name="jana_invoice" value="1"/>
								</form>
							</td>
						</tr>
				<?php
					}else{
							
							echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
						
					}
				?>
		    </table>
			<div class="clearfix"> </div>
			
		</div>
	</div>
</div>
</div>