<?php 
session_name('r2z');
session_start();
?>

<?php

  function encryptIt($q) {
      $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
      $qEncoded  = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
      return($qEncoded);
  }

  function decryptIt($q) {
      $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
      $qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
      return($qDecoded);
  }

  if(isset($_POST['forget'])){

    include 'includes/dbconnect.php';  
    require_once('class.phpmailer.php');

    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM customer WHERE Cususername = '$username' AND Email = '$email'";
    $result = mysqli_query($dbc,$sql) or die('Query failed. ' . mysqli_error());
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    

    if (mysqli_num_rows($result) == 1) {

        $password = $row['Password'];
        $decrypted = decryptIt($password);
        $name = $row['Cusname'];
        $message = "Hi,<br><br>Mr/Mrs,<br><br>Your Password :".$decrypted."<br><br>Please keep this email safely.Thank you.";

        $mail  = new PHPMailer();
        $mail->IsSMTP();
         
        $mail->SMTPAuth   = true;                  
        $mail->SMTPSecure = "tls";                
        $mail->Host       = 'smtp.gmail.com';      
        $mail->Port       = 587;                   
        $mail->Username   = "bielabaiduri@gmail.com";  // email gmail
        $mail->Password   = "starrynight218";            // password gmail
         
        $mail->From       = "bielabaiduri@gmail.com";
        $mail->FromName   = "R2Z : Road To Zoo Administrator";
        $mail->Subject    = "Forget Password - Member";
        $mail->MsgHTML($message);

        $mail->AddAddress($email,$name);                         

        $mail->IsHTML(true); 
         
        if(!$mail->Send()) 
        {
          echo "Mailer Error: " . $mail->ErrorInfo;
        } else{

          print "<script>";
          print "alert('Email sent successfully'); self.location='login.php';"; 
          print "</script>";

        }
    }else{

        print "<script>";
        print "alert('Sorry.Your username or email not found'); self.location='login.php';"; 
        print "</script>";
    }
        
  }


?>

<?php

  if(isset($_POST['regmember'])){

    include 'includes/dbconnect.php';  
    $Cususername = $_POST['username'];
    $Ic = $_POST['Ic'];
    $Cusname = $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Notel = $_POST['notel'];
    $Password = $_POST['password'];
    $CPassword = $_POST['cpassword'];
  
    $encrypted = encryptIt($Password);
    //$decrypted = decryptIt($encrypted);

    if($Password!=$CPassword){

       print "<script>";
       print " alert('Password not match Confirm Password');self.location='login.php';"; 
       print "</script>";

    }else{

      $sql = "INSERT INTO customer (Cususername,Ic,Cusname,Password,Email,Address,Notel) VALUES('$Cususername','$Ic','$Cusname','$encrypted','$Email','$Address','$Notel')"; 
      mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

      print "<script>";
      print "alert('Registed!!');self.location='login.php'"; 
      print "</script>";


    }

  }

  
  if(isset($_POST['btn_login']))
  {
    include '../includes/dbconnect.php';   
    $username = trim(addslashes($_POST['txt_username']));
    $password = trim(addslashes($_POST['txt_password']));
    $encrypted = encryptIt($password);
    
    if ($username != '' && $password != '') 
    {   
      $sql = "SELECT *  
              FROM customer
              WHERE Cususername = '$username' AND Password = '$encrypted'";

      $result = mysqli_query($dbc,$sql) or die('Query failed. ' . mysqli_error());
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      if (mysqli_num_rows($result) == 1) 
      {

          $_SESSION['user_id'] = $row['Ic'];
          $_SESSION['userid'] = $row['Cusid'];
          $_SESSION['user_name'] = $row['Cusname'];

          function createRandomPassword()
          {
              $chars = "abcdefghijkmnopqrstuvwxyz023456789";
              srand((double)microtime()*1000000);
              $i = 0;
              $pass = '' ;
              
              while ($i <= 7) {
            
                $num = rand() % 33;
                $tmp = substr($chars, $num, 1);
                $pass = $pass . $tmp;
                $i++;
              }
              return $pass;
          }
              
          $confirmation = createRandomPassword();
          $_SESSION['Transcode'] = $confirmation;

          print "<script>";
          print " self.location='~/../s_member/index.php';"; 
          print "</script>";        
      } 
      else
      {
        $error = "Please check your Username and Password!!";
      }   
    }
    else
    {
        $error = "Please fill in your Username or Password!!";
    }       
  }


?>
  
<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/facebox.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({//apply all anchor tag which has rel=facebox attribute
        loadingImage : 'css/loading.gif',
        closeImage   : 'css/closelabel.png'
      })
    });
});
</script>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {      
       $("#myModal").modal('show')
    });
        
</script>

<style type="text/css">

  table.table {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 6px 6px 0 rgba(0, 0, 0, 0); 
    font-size: 12px;
  }

</style>

</head>

<body>

<?php if(!empty($error)): ?>

    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login Failed</h4>
          </div>
          <div class="modal-body">
            <?php echo $error; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php endif ?>

 <div class="container">
<div id="page">
  <div id="content">

    <div id="events">
	
      <legend><strong>Member Login</strong></legend>

      <div class="" style="text-align:center">
  
      <form class="form-horizontal" method="post" action="../login.php">

          <table style="background-color:#ddd" class="table table-condensed">
                <tr>
                    <td style="text-align:right"><strong>Username </strong></td>
                    <td><input class="form-control" type="text" name="txt_username" id="inputUsername" placeholder="Username"></td>
                </tr>
                <tr>
                    <td style="text-align:right"><strong>Password </strong></td>
                    <td><input class="form-control" type="password" name="txt_password" id="inputPassword" placeholder="Password"></td>
                </tr>
                <tr style="text-align:left">
                    <td>&nbsp;</td>
                    <td>
                      <input type="submit" name="btn_login" class="btn" value="Sign in"/>
                      <input type="reset" class="btn btn-danger" value="Reset"/>
                    </td>
                </tr>
                <tr style="text-align:left">
                    <td>&nbsp;</td>
                    <td><a  rel="facebox" href="forgetpass.php">Forgot Password?</a> | <a rel="facebox" href="newmember.php">New Member?</a></td>
                </tr>
          </table>

      </form>

      </div>

    </div>
  </div>
 
</div>
 </div>
</body>
</html>
