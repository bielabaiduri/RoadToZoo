<?php require '../bootstrap.php';?>

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
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="../images/logo-page.jpg" alt=""/></a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="profilecust.php">Profile</a></li>
      <li id="link6"><a href="logout.php">Logout</a></li>
      <li id="link7"><a href="#" data-toggle="modal" data-target="#myModalcart" class="offer-img"><span style="color:yellow" class="fa fa-shopping-cart my-cart-ico"> <?php echo $bil; ?></span></a></li>
    </ul>


  </div>
  <div id="content">
    <div id="events">
      <legend><strong>New Bookings</strong></legend> 

       <table  class="table table-bordered table-condensed table-hover" id="list"> 
         <thead>
            <tr>
              <td width="300px">Picture</td>
              <td width="150px">Package Detail</td>
            </tr>
         </thead>
         <tbody>
        <?php 
            $sql_package = " SELECT * FROM package ORDER BY Packagename ASC";                
            $result_package = mysqli_query($dbc,$sql_package) or die('Query failed. ' . mysqli_error());

            $tmpCount = 1;
            while($row = mysqli_fetch_assoc($result_package)) {?> 
            <tr style="background-color:#fff">
                <td><a href="#"><img style="max-width:200px" src="../picture/<?php echo $row['Pictureurl']?>" alt=""/></a></td>
                <td>
                  <h4><a href="#"><font color="black"><?php echo $row['Packagename']?> | <?php echo $row['Packagetype']?> </font></a></h4>
                  <p>Open Hours : <font color="black"><?php echo $row['Packagetime']?></font></p>
                  <p>Price (RM) : <font color="black"><?php echo $row['Price']?></font></p>
                  <p>
                      <form method="post" action="createbooking.php?action=add&id=<?php echo $row["Packageid"]; ?>">
                       <input type="hidden" name="quantity" class="form-control" value="1" />
                       <input type="hidden" name="hidden_name" value="<?php echo $row["Packagename"].' | '.$row['Packagetype']; ?>" />
                       <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
                       <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-warning" value="Add to Cart" />
                      </form>
                  </p>
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
      $('#list').DataTable( {
          "lengthMenu": [[3], [3]],
      } );
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




</html>
