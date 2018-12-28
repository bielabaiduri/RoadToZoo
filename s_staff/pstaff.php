<?php require '../bootstrap.php';?>


<?php

    $Staffic = $_SESSION['user_id'];
    $sql_p = "SELECT * FROM staff WHERE Staffic = '$Staffic'"; 
    $result_p = mysqli_query($dbc,$sql_p) or die('Query failed. ' . mysqli_error());
    $row = mysqli_fetch_array($result_p, MYSQLI_ASSOC);

?>

<?php

   if(isset($_POST['updateprofile'])){

    $Staffid = $_POST['staffid'];
    $Staffname = $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Notel = $_POST['tel'];


    $sql = "UPDATE staff SET Staffname='$Staffname',Email='$Email',Address='$Address',Notel='$Notel' WHERE Staffid = '$Staffid'"; 
    mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

    print "<script>";
    print "alert('Staff info updated'),self.location='profilestaff.php'"; 
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
      <li id="link3"><a href="viewstatistic.php">Statistics</a></li>
      <li id="link4"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="viewpackage.php">Packages</a></li>
      <li id="link6" class="selected"><a href="profilestaff.php">Profile</a></li>
      <li id="link7"><a href="logout.php">Logout</a></li>
    </ul>
  </div>


  <div id="content">
    <div id="events">
      <legend><strong>Profile</strong></legend>

      <form name="form1" id="form1" method="post" action="viewevents.php">

            <table class="table table-bordered" border="0" style="background-color:#ddd">
                <tr>
                  <td><strong>Staff IC</strong></td>
                  <td>
                     <div class='col-lg-12'>
                        <?php echo $row['Staffic'];?>
                    </div>
                    </td>
                </tr>
                <tr>
                  <td><strong>Staff Name</strong></td>
                  <td>
                    <div class='col-lg-12'>
                         <?php echo $row['Staffname'];?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Staff Email</strong></td>
                  <td>
                    <div class='col-lg-12'>
                        <?php echo $row['Email'];?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Staff Address</strong></td>
                  <td>
                    <div class='col-lg-12'>
                        <?php echo $row['Address'];?> 
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><strong>Staff Telephone</strong></td>
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
        <li><a href="viewstatistic.php">Statistics</a></li>
        <li><a href="viewevents.php">Events</a></li>
        <li><a href="viewpackage.php">Packages</a></li>
        <li><a href="profilestaff.php">Profile</a></li>
      </ul>
      <p>Copyright &copy; <?php echo date('Y')?> <a href="#">Road To Zoo</a> - All Rights Reserved </p>
    </div>
  </div>
</div>
</body>

<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/facebox.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/fastclick/fastclick.js"></script>
<script src="../assets/dist/js/app.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>

<script>
$(document).ready(function() {
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({//apply all anchor tag which has rel=facebox attribute
        loadingImage : '../css/loading.gif',
        closeImage   : '../css/closelabel.png'
      })
    });
});
</script>

<script type="text/javascript">

$(document).ready(function() {
    $('#list').DataTable();
} );

</script>

</html>
