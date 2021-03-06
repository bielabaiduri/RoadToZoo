<?php require '../bootstrap.php';?>

<?php

  if(isset($_POST['addpackage'])){

    $Packagename = $_POST['packagename'];
    $Packagetime = $_POST['packagetime'];
    $Packagetype = $_POST['packagetype'];
    $Price = $_POST['price'];
    
    $target = "../picture/";  
    $ok=1;  

    if ($ok==0) 
    { 
      echo "Cannot Upload"; 
    } 
    else 
    { 
        if(file_exists("../picture/" . $_FILES['uploaded']['name']))
        {
          $new = '';
        }
        else
        {
          $tarikh_s = date('Y-m-d');
          $filename  = basename($_FILES['uploaded']['name']);
          $extension = pathinfo($filename, PATHINFO_EXTENSION);
          $new  = rand(0,9999).'-'.$tarikh_s.'.'.$extension;

          if(!empty($new)){

             if(move_uploaded_file($_FILES["uploaded"]["tmp_name"], $target.$new)) { 
              
             } 
             else 
             { 
               echo "Sorry, there was a problem uploading your file."; 
             } 
          }
         
        }  
    }

    $sql = "INSERT INTO package (Packagename,Packagetime,Packagetype,Price,Pictureurl) VALUES('$Packagename','$Packagetime','$Packagetype','$Price','$new')"; 
    mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

    print "<script>";
    print "alert('New package added');self.location='viewpackage.php'"; 
    print "</script>";

  }

   if(isset($_POST['updatepackage'])){

    $Packageid = $_POST['packageid'];
    $Packagename = $_POST['packagename'];
    $Packagetime = $_POST['packagetime'];
    $Packagetype = $_POST['packagetype'];
    $Price = $_POST['price'];

    $target = "../picture/";  
    $ok=1;  

    if ($ok==0) 
    { 
      echo "Cannot Upload"; 
    } 
    else 
    { 
        if(file_exists("../picture/" . $_FILES['uploaded']['name']))
        {
          $new = '';
        }
        else
        {
          $tarikh_s = date('Y-m-d');
          $filename  = basename($_FILES['uploaded']['name']);
          $extension = pathinfo($filename, PATHINFO_EXTENSION);
          $new  = rand(0,9999).'-'.$tarikh_s.'.'.$extension;

          if(!empty($new)){

             if(move_uploaded_file($_FILES["uploaded"]["tmp_name"], $target.$new)) { 
              
             } 
             else 
             { 
               echo "Sorry, there was a problem uploading your file."; 
             } 
          }
         
        }  
    }

    $sql = "UPDATE package SET Packagename='$Packagename',Packagetime='$Packagetime',Packagetype='$Packagetype',
            Price='$Price',Pictureurl='$new' WHERE Packageid = '$Packageid'"; 
    mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

    print "<script>";
    print "alert('Package updated');self.location='viewpackage.php'"; 
    print "</script>";

  }

?>


<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Packages</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style_invoice.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
<link href="../css/facebox.css" media="screen" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="../images/logo-page.jpg" alt=""/></a>
    <a rel="facebox" href="add_package.php"  id="button">Create Package</a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewstatistic2.php">Statistics</a></li>
      <li id="link4"><a href="viewevents.php">Events</a></li>
      <li id="link5"  class="selected"><a href="viewpackage.php">Packages</a></li>
      <li id="link6"><a href="profilestaff.php">Profile</a></li>
      <li id="link7"><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <div id="content">
    <div id="events">
      <legend><strong>Packages</strong></legend>
         <table  class="table table-bordered table-condensed table-hover" id="list"> 
         <thead>
            <tr>
              <td width="300px">Picture</td>
              <td width="150px">Package Detail</td>
            </tr>
         </thead>
         <tbody>
        <?php 

            $today = date('Y-m-d');
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
                    <a rel="facebox" href="update_package.php?ids=<?php echo $row['Packageid']; ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a> | 
                    <a href="delete_package.php?id=<?php echo $row['Packageid']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
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

<script>
  $(document).ready(function() {
      
        $('a[rel*=facebox]').facebox({
          loadingImage : '../css/loading.gif',
          closeImage   : '../css/closelabel.png'
        })  
  });
</script>

<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#list').DataTable( {
          "lengthMenu": [[3], [3]],
      } );
  } );
</script>
</html>
