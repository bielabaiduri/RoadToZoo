<?php  require '../bootstrap01.php';?>
<?php include "../s_member/menu.php";?>

<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Bookings</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="../css/style_invoice.css" type="text/css" /> -->
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
  <div id="header"> 
    
      
      
     


  </div>
  <div id="content">
    <div id="events">
      <legend><strong>New Bookings</strong></legend> 
<a href="#" data-toggle="modal" data-target="#myModalcart" class="offer-img"><span style="color:black" class="fa fa-shopping-cart my-cart-ico"> <?php echo $bil; ?></span></a>

       <table  class="table table-bordered table-condensed table-hover" id="list"> 
         <thead>
            <tr>
              
            </tr>
         </thead>
         <tbody>
            <?php 
            $sql_package = " SELECT * FROM package ORDER BY Packagename ASC";                
            $result_package = mysqli_query($dbc,$sql_package) or die('Query failed. ' . mysqli_error());

            $tmpCount = 1;
            while($row = mysqli_fetch_assoc($result_package)) {?> 
            <tr style="background-color:#fff">
                <td><a href="#"><img style="width:200px" src="../picture/<?php echo $row['Pictureurl']?>" alt=""/></a></td>
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
