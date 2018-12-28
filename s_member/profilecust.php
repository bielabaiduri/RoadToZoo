<?php require '../bootstrap.php';?>
<?php include "menu.php";?>
<?php

    $Custic = $_SESSION['user_id'];
    $sql_p = "SELECT * FROM customer WHERE Ic = '$Custic'"; 
    $result_p = mysqli_query($dbc,$sql_p) or die('Query failed. ' . mysqli_error());
    $row = mysqli_fetch_array($result_p, MYSQLI_ASSOC);

?>

<?php

   if(isset($_POST['updateprofile'])){

    $Cusid = $_POST['cusid'];
    $Cusname = $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Notel = $_POST['tel'];

    $sql = "UPDATE customer SET Cusname='$Cusname',Email='$Email',Address='$Address',Notel='$Notel' WHERE Cusid = '$Cusid'"; 
    mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

    print "<script>";
    print "alert('Customer info updated'),self.location='profilecust.php'"; 
    print "</script>";

  }

?>
<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Profile</title>
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
    <a href="update_profile.php" rel="facebox" id="button">Update Profile</a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewevents.php">Events</a></li>
      <li id="link5" class="selected"><a href="profilecust.php">Profile</a></li>
      <li id="link6"><a href="logout.php">Logout</a></li>
      <li id="link7"><a href="#" data-toggle="modal" data-target="#myModalcart" class="offer-img"><span style="color:yellow" class="fa fa-shopping-cart my-cart-ico"> <?php echo $bil; ?></span></a></li>
    </ul>
  </div>


  <div id="content">
    <div id="events">
      <legend><strong>Profile</strong></legend>

      <form name="form1" id="form1" method="post" action="viewevents.php">

            <table class="table table-bordered" border="0" style="background-color:#ddd">
                <tr>
                  <td><strong>Member IC</strong></td>
                  <td>
                     <div class='col-lg-12'>
                        <?php echo $row['Ic'];?>
                    </div>
                    </td>
                </tr>
                <tr>
                  <td><strong>Member Name</strong></td>
                  <td>
                    <div class='col-lg-12'>
                         <?php echo $row['Cusname'];?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Member Email</strong></td>
                  <td>
                    <div class='col-lg-12'>
                        <?php echo $row['Email'];?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Member Address</strong></td>
                  <td>
                    <div class='col-lg-12'>
                        <?php echo $row['Address'];?> 
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Member Telephone</strong></td>
                  <td>
                    <div class='col-lg-12'>
                        <?php echo $row['Notel'];?>
                    </div>
                  </td>
                </tr>    
          </table>
      </form>
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

<script type="text/javascript" src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script type="text/javascript">

  $(document).ready(function() {
      $('#list').DataTable();
  } );
</script>


<script src="../assets/js/facebox.js" type="text/javascript"></script>

<script>
  $(document).ready(function() {
      
        $('a[rel*=facebox]').facebox({
          loadingImage : '../css/loading.gif',
          closeImage   : '../css/closelabel.png'
        })  
  });
</script>

</html>
