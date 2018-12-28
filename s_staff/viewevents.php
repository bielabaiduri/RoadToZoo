<?php require '../bootstrap.php';?>
<?php include '../token/notification.php';?>

<?php
	//$message_status = send_notification($tokens, $message);
	//echo $message_status;
  if(isset($_POST['addevent'])){

    $Eventname = $_POST['eventname'];
    $Eventdate = $_POST['eventdate'];
    $Eventtime = $_POST['eventtime'];
    $Eventplace = $_POST['eventplace'];
    $Description = $_POST['description'];
    $Handleby = $_POST['handleby'];
    $Targetcus = $_POST['target'];

    $sql = "INSERT INTO event (Eventname,Eventdate,Eventtime,Eventplace,Description,Handleby,Targetcus) VALUES('$Eventname','$Eventdate','$Eventtime','$Eventplace','$Description','$Handleby','$Targetcus')"; 
    mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

    $db=new PDO('mysql:dbname=r2z;host=localhost;','root',''); 
    $row = $db->prepare ("SELECT Cusname,Email FROM customer");
    $row->execute(); 

    require_once('../class.phpmailer.php');
    
    $message = "Hi<br><br>Mr/Mrs,<br><br>We want informed you that the Road To Zoo will hold a new event as follows:<br><br>
                Name : ".$Eventname."<br>
                Date : ".$Eventdate."<br>
                Time : ".$Eventtime."<br>
                Place : ".$Eventplace."<br>
                Description : ".$Description."<br>
                Handly By : ".$Handleby."<br>
                Target Customer : ".$Targetcus."<br><br><br>Thank you.";

    $mail  = new PHPMailer();
    $mail->IsSMTP();
     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "tls";                
    $mail->Host       = 'smtp.gmail.com';      
    $mail->Port       = 587;                   
    $mail->Username   = "bielabaiduri@gmail.com";  
    $mail->Password   = "starrynight218";            
     
    $mail->From       = 'bielabaiduri@gmail.com';
    $mail->FromName   = 'R2Z : Road To Zoo Administrator';
    $mail->Subject    = "New Events Notification From Road To Zoo";
    $mail->MsgHTML($message);
     
    foreach($row as $to_add){
        $mail->AddAddress($to_add['Email'],$to_add['Cusname']);         
//clear recepient        
    }

    $mail->IsHTML(true); 
     
    if(!$mail->Send()) 
    {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } 
	
	//echo send_notification($tokens, $messagePush);
	
    print "<script>";
    print "alert('New event added')"; 
    print "</script>";

  }

   if(isset($_POST['updateevent'])){

    $Eventid = $_POST['eventid'];
    $Eventname = $_POST['eventname'];
    $Eventdate = $_POST['eventdate'];
    $Eventtime = $_POST['eventtime'];
    $Eventplace = $_POST['eventplace'];
    $Description = $_POST['description'];
    $Handleby = $_POST['handleby'];
    $Targetcus = $_POST['target'];

    $sql = "UPDATE event SET Eventname='$Eventname',Eventdate='$Eventdate',Eventtime='$Eventtime',
            Eventplace='$Eventplace',Description='$Description',Handleby='$Handleby',Targetcus='$Targetcus' WHERE Eventid = '$Eventid'"; 
    mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

    print "<script>";
    print "alert('Event updated')"; 
    print "</script>";

  }

?>

<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Events</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
    
    <a href="add_events.php" rel="facebox" id="button">Create Events</a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewstatistic2.php">Statistics</a></li>
      <li id="link4" class="selected"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="viewpackage.php">Packages</a></li>
      <li id="link6"><a href="profilestaff.php">Profile</a></li>
      <li id="link7"><a href="logout.php">Logout</a></li>
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
                <td width="100px"></td>
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
                  <td>
                    <a rel="facebox" href="update_events.php?id=<?php echo $row['Eventid']; ?>" class="btn btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="delete_events.php?id=<?php echo $row['Eventid']; ?>" class="btn btn-xs"><i class="fa fa-remove"></i></a>
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
      } );
  } );
</script>

</html>
