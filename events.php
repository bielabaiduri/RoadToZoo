<?php require 'bootstrap_.php';?>      
<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Events</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style_invoice.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="images/logo-page.jpg" alt=""/></a>
    <a href="login.php" id="button">Buy Tickets</a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="package.php">Packages</a></li>
      <li id="link4" class="selected"><a href="events.php">Events</a></li>
      <li id="link5"><a href="login.php">Member</a></li>
      <li id="link6"><a href="login_staff.php">Staff</a></li>
    </ul>
  </div>


  <div id="content">
    <div id="events">
      <legend><strong>Events List</strong></legend>

            <table class="table table-bordered table-condensed table-hover" id="list">
            <thead>
              <tr>
                <td width="10px"></td>
                <td width="100px">Name</td>
                <td width="100px">Date</td>
                <td width="150px">Time</td>
                <td width="150px">Place</td>
                <td width="150px">Description</td>
                <td width="150px">Handly By</td>
                <td width="150px">Target Cust</td>
              </tr>
            </thead>
            <tbody>
            <?php 

                $sql_event = " SELECT * FROM event";                
                $result_event = mysqli_query($dbc,$sql_event) or die('Query failed. ' . mysqli_error());

                $tmpCount = 1;
                while($row = mysqli_fetch_assoc($result_event)) {?>   
                <tr style="background-color:#fff">
                  <td><?php echo $tmpCount; ?></td>
                  <td><?php echo $row['Eventname']; ?></td>
                  <td><?php echo $row['Eventdate']; ?></td>
                  <td><?php echo $row['Eventtime']; ?></td>
                  <td><?php echo $row['Eventplace']; ?></td>
                  <td><?php echo $row['Description']; ?></td>
                  <td><?php echo $row['Handleby']; ?></td>
                  <td><?php echo $row['Targetcus']; ?></td>
                </tr> 
                <?php $tmpCount++; } 
              
            ?>  
            </tbody>
            </table>
    </div>
  </div>

  <div id="footer">
    <div> <a href="#" class="logo"><img src="images/animal-kingdom.jpg" alt=""/></a>
      <div>
        <p>Road To Zoo</p>
        <span>03-89531111 / 2222</span> <span>email@roadtozoo.com</span> </div>
      <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="package.php">Packages</a></li>
        <li><a href="events.php">Events</a></li>
      </ul>
      <p>Copyright &copy; <?php echo date('Y')?> <a href="#">Road To Zoo</a> - All Rights Reserved </p>
    </div>
  </div>
</div>
</body>


<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/facebox.js" type="text/javascript"></script>

<script>
  $(document).ready(function() {
      
        $('a[rel*=facebox]').facebox({
          loadingImage : 'css/loading.gif',
          closeImage   : 'css/closelabel.png'
        })  
  });
</script>

<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#list').DataTable( {
      } );
  } );
</script>

</html>
