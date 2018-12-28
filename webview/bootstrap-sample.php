<?php
	
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>Road To Zoo | Login</title>
   
  </head>
  <body>
	<div class="container">

		<h1>Welcome, Road To Zoo</h1>
		
		<form method="post" action="../login.php">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="text" class="form-control" name="txt_username" id="txt_username" name="Cususername" placeholder="Enter Username">
			
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="txt_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		   <input type="hidden" name="isMobileView" value="1">
		  <input type="submit" name="btn_login" class="btn btn-primary" value="submit"/> 
		</form>

	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>