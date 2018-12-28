<?php require '../bootstrap.php';?>
<?php include "menu.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap_index.css">
<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<style type="text/css">

  table.table {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 6px 6px 0 rgba(0, 0, 0, 0); 
    font-size: 12px;
  }

</style>
</head>
<body>
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="../images/logo.jpg" alt=""/></a>
    <ul>
      <li class="first">
        <h2><a href="#">Live</a></h2>
        <span>Have fun in your visit</span> </li>
      <li>
        <h2><a href="#">Love</a></h2>
        <span>Donate for the animals</span> </li>
      <li>
        <h2><a href="#">Learn</a></h2>
        <span>Get to know the animals</span> </li>
    </ul>
    <a href="createbooking.php">Create Bookings</a>

    <ul id="navigation">
      <li id="link1" class="selected"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="profilecust.php">Profile</a></li>
      <li id="link6"><a href="logout.php">Logout</a></li>
      <li id="link7"><a href="#" data-toggle="modal" data-target="#myModalcart" class="offer-img"><span style="color:yellow" class="fa fa-shopping-cart my-cart-ico"> <?php echo $bil; ?></span></a></li>
    </ul>

    <img src="../images/lion-family.jpg" alt=""/>
    <div>
      <h1>Special Events:</h1>
       <?php 
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $today_event = date('Y-m-d');
            $sql_eventa = " SELECT * FROM event WHERE Eventdate = '$today_event'LIMIT 1 ";                
            $result_eventa = mysqli_query($dbc,$sql_eventa) or die('Query failed. ' . mysqli_error());
            $row = mysqli_fetch_assoc($result_eventa);  

        ?>
        <?php if(mysqli_num_rows($result_eventa)!=0):?>
        <p><a href="#"><span><?php echo date('d M Y',strtotime($row['Eventdate'])) ?> | <?php echo $row['Eventtime']; ?></span></a> | <?php echo $row['Eventname']." | "."Place : ".$row['Eventplace']; ?> </p>
        <?php else:?>
         <p>No Event For Today</p>
        <?php endif?>      
    </div>
  </div>
  <div id="content">
    <div id="featured">
      <h2>Meet our Animals</h2>
      <ul>
        <li class="first"> <a href="#"><img src="../images/penguin.jpg" alt=""/></a> <a href="#">Duis laoreet</a> </li>
        <li> <a href="#"><img src="../images/elephant.jpg" alt=""/></a> <a href="#">Curabitur</a> </li>
        <li> <a href="#"><img src="../images/owl.jpg" alt=""/></a> <a href="#">Adipiscing</a> </li>
        <li> <a href="#"><img src="../images/butterfly.jpg" alt=""/></a> <a href="#">Sed Volutpat</a> </li>
        <li> <a href="#"><img src="../images/turtle.jpg" alt=""/></a> <a href="#">Nulla lobortis</a> </li>
        <li> <a href="#"><img src="../images/snake.jpg" alt=""/></a> <a href="#">Suspendisse</a> </li>
        <li> <a href="#"><img src="../images/gorilla.jpg" alt=""/></a> <a href="#">Tincidunt</a> </li>
      </ul>
    </div>
    <div class="section1">
      <h2>Events</h2>
      <ul id="article">

        <?php 
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $today = date('Y-m-d');
            $sql_event = " SELECT * FROM event WHERE Eventdate >= '$today' ORDER BY Eventdate  LIMIT 3 ";                
            $result_event = mysqli_query($dbc,$sql_event) or die('Query failed. ' . mysqli_error());

            while($row = mysqli_fetch_assoc($result_event)) {?> 

            <li> <a href="#"><span><?php echo date('d M Y',strtotime($row['Eventdate'])) ?> | <?php echo $row['Eventtime']; ?></span></a>
              <p><?php echo $row['Eventname']." | ".$row['Description']." | "."Place : ".$row['Eventplace']; ?></p>
              <p><?php echo "Handle By : ".$row['Handleby']." | "."Target To : ".$row['Targetcus'] ?></p>
            </li>

            <?php } 
          
        ?>  

      </ul>

    </div>
  
    <div class="section3">
      <h2>Connect</h2>
      <a href="#" id="email">Email Us</a> <a href="#" id="facebook">Facebook</a> <a href="#" id="twitter">Twitter</a>
      <img src="../images/penguin2.jpg" alt=""/> </div>
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

<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $('#list').DataTable();
} );

</script>

</html>

