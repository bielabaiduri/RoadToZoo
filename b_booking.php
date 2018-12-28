<?php
	if(isset($_POST['exampleInputEmail1'])) {
		echo $_POST['exampleInputEmail1'];
	}
?>

		   
<?php include "menu.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Bookings</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style_invoice.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
<link href="../css/facebox.css" media="screen" rel="stylesheet" type="text/css" />



<style type="text/css">

  table.table {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 6px 6px 0 rgba(0, 0, 0, 0); 
    font-size: 12px;
  }

</style>
</head>
<body>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   
  </head>
  <body>
	<div class="container">

		
		
		<form method="post">
		
		

  <div id="content">
    <div id="events">
      <legend><strong>Bookings / Order List</strong></legend>

            <table class="table table-bordered table-condensed table-hover" id="list">
            <thead>
              <tr>
                <td width="10px"></td>
                <td width="100px">Ticket Date</td>
                <td width="100px">Total Payment</td>
                <td width="100px">Order Status</td>
                <td width="100px">Ticket Details</td>
              </tr>
            </thead>
            <tbody>
            <?php 

                $Cust_id  = $_SESSION['userid'];
                $sql_b = " SELECT * FROM booking_detail WHERE Cusid = '$Cust_id'";                
                $result_b = mysqli_query($dbc,$sql_b) or die('Query failed. ' . mysqli_error());

                $tmpCount = 1;
                while($row = mysqli_fetch_assoc($result_b)) {?>   
                <tr style="background-color:#fff">
                  <td><?php echo $tmpCount; ?></td>
                  <td><?php echo date('d M Y',strtotime($row['bookingdate'])); ?></td>
                  <td><?php echo $row['totalpayment']; ?></td>
                  <td><?php echo $row['order_status']; ?></td>
                  <td>
                    <a rel="facebox" href="ticket_detail.php?id=<?php echo $row['transcode']; ?>" class="btn btn-xs"><i class="fa fa-list"></i></a>
                  </td>
                </tr> 
                <?php $tmpCount++; } 
              
            ?>  
            </tbody>
            </table>
    </div>
  </div>

  <div id="footer">
    <div> <a href="#" class="logo"><img src="../images/animal-kingdom.jpg" alt=""/></a>
      <div>
        <p>Road To Zoo</p>
        <span>03-89531111 / 2222</span> <span>email@roadtozoo.com</span> </div>
      <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="viewbooking.php">Bookings</a></li>
        <li><a href="viewevents.php">Events</a></li>
      </ul>
      <p>Copyright &copy; <?php echo date('Y')?> <a href="#">Road To Zoo</a> - All Rights Reserved </p>
    </div>
  </div>
</div>
</body>

<!-- <script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script> -->
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/facebox.js"></script>

<script>
  $(document).ready(function() {
      
        $('a[rel*=facebox]').facebox({
          loadingImage : '../css/loading.gif',
          closeImage   : '../css/closelabel.png'
        })  
  });
</script>

<script type="text/javascript" src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
      $('#list').DataTable();
  } );
</script>


<script type="text/javascript" src="../assets/js/facebox.js" ></script>
<script>
  $(document).ready(function() {
      
        $('a[rel*=facebox]').facebox({
          loadingImage : '../css/loading.gif',
          closeImage   : '../css/closelabel.png'
        })  
  });
</script>
		</form>

	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>