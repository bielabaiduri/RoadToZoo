<?php require '../bootstrap.php';?>

<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Statistics</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../css/style_invoice.css" type="text/css" />

<link href="../assets/plugins/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../assets/plugins/vendor/morrisjs/morris.css" rel="stylesheet">
<link href="../assets/plugins/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="../assets/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">




</head>
<body>
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="../images/logo-page.jpg" alt=""/></a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3" class="selected"><a href="viewstatistic2.php">Statistics</a></li>
      <li id="link4"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="viewpackage.php">Packages</a></li>
      <li id="link6"><a href="profilestaff.php">Profile</a></li>
      <li id="link7"><a href="logout.php">Logout</a></li>
    </ul>
  </div>


  

  <div id="content">
    <div id="events">
      <legend><strong>Statistics (Graph)</strong></legend>

      <form name="form1" id="form1" method="post" action="">

        <table class="table table-condensed" border="0" style="width:600px">
          
            <tr>
              <td>Month</td>
              <td>
                <div class='col-lg-12'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' name="dated" id="dated" class="form-control" date-format="mm/yyyy" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
              </td>
            </tr>
      
      </table>

      <input name="carian" type="submit" class="btn  btn-primary" id="carian" value="Display Graph" />

     </form>
     <br>

     <legend>Package Pickup By Customer On <?php echo $date ?> </legend>
   
     <?php


        $db=new PDO('mysql:dbname=r2z;host=localhost;','root',''); 
		$bulan=$_POST['dated'];
        $row = $db->prepare ("SELECT b.Packagename,b.Packagetype AS 'type',SUM(totalpayment) AS 'jum' 
                              FROM booking AS a, package AS b, booking_detail AS c 
                              WHERE a.Packageid = b.Packageid AND 
                                    a.transcode = c.transcode AND  
                                    c.bookingdate like '$bulan%'
                              GROUP BY b.Packagename");
        $row->execute(); 
	 
        $json_data=array();
        foreach($row as $rec)  
        {  
            $json_array['label']=$rec['Packagename']."(".$rec['type'].")";  
			$json_array['value']=$rec['jum'];  

            $json_pie['label']=$rec['Packagename']."(".$rec['type'].")";  
            $json_pie['data']=$rec['jum']; 
            array_push($json_data,$json_array);   
        } 


        $row2 = $db->prepare ("SELECT b.Packagename,b.Packagetype AS 'type',COUNT(*) AS 'jum' 
                              FROM booking AS a, package AS b, booking_detail AS c 
                              WHERE a.Packageid = b.Packageid AND 
                                    a.transcode = c.transcode AND  
                                    c.bookingdate like '$bulan%'
                              GROUP BY b.Packagename");
        $row2->execute(); 

        $json_datapie=array();

        foreach($row2 as $rec2)  
        {  
            $json_pie['label']=$rec2['Packagename']."(".$rec2['type'].")";  
            $json_pie['data']=$rec2['jum'];  
            array_push($json_datapie,$json_pie);  
        } 

    ?>
      <div class="row">
            <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total of Collection (RM)
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                        </div>
                    </div>
            </div>
            

            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Category of 
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
      </div><br><br>
            
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

<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../assets/plugins/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/datepicker/js/moment-with-locales.js"></script>
<script src="../assets/datepicker/js/bootstrap-datetimepicker.js"></script>
<script src="../assets/plugins/vendor/flot/excanvas.min.js"></script>
<script src="../assets/plugins/vendor/flot/jquery.flot.js"></script>
<script src="../assets/plugins/vendor/flot/jquery.flot.pie.js"></script>
<script src="../assets/plugins/vendor/flot/jquery.flot.resize.js"></script>
<script src="../assets/plugins/vendor/flot/jquery.flot.time.js"></script>
<script src="../assets/plugins/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<!-- <script src="../assets/plugins/data/flot-data.js"></script> -->

<!-- Morris Charts JavaScript -->
<script src="../assets/plugins/vendor/raphael/raphael.min.js"></script>
<script src="../assets/plugins/vendor/morrisjs/morris.min.js"></script>
<!-- <script src="../assets/plugins/data/morris-data.js"></script> -->

<script type="text/javascript">
    $(function () {

        $('#datetimepicker1').datetimepicker({
          format: "YYYY-MM"
        });
    });

</script>


<script type="text/javascript" charset="utf-8">

    $(document).ready( function () {

      Morris.Donut({
      element: 'morris-donut-chart',
      data: <?php echo json_encode($json_data)?>,
      colors: ["#693196", "#f56954", "#333333"],
      
      resize:true
      });

    });

    $(function() {

        var data = <?php echo json_encode($json_datapie)?>;
        var plotObj = $.plot($("#flot-pie-chart"), data, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

    });

   

</script>

</html>