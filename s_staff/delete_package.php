<?php

	if (isset($_GET['id']))
	{
		$id=$_GET['id'];
		include '../includes/dbconnect.php';
		
		print ("<SCRIPT LANGUAGE='JavaScript'>
		var answer=window.confirm('Are sure want to delete this record?')
		if(answer){
										
			 window.location='delete_package.php?delete=ya&bil=$id';					 	 
		}
		else
		{				 
			 window.location='viewpackage.php?';
		}	
		</SCRIPT>");	
			
	}
	
?>

 <?php
 
 	if (isset($_GET['delete']))
	{		
		include '../includes/dbconnect.php';
		$id=$_GET['bil'];		
		$sql = "DELETE FROM package WHERE Packageid ='$id'"; 
		mysqli_query($dbc,$sql) or die(mysqli_error());
		header("location: viewpackage.php?");				
			
	}  
 ?>