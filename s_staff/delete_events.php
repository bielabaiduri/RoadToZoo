<?php

	if (isset($_GET['id']))
	{
		$id=$_GET['id'];
		include '../includes/dbconnect.php';
		
		print ("<SCRIPT LANGUAGE='JavaScript'>
		var answer=window.confirm('Are sure want to delete this record?')
		if(answer){
										
			 window.location='delete_events.php?delete=ya&bil=$id';					 	 
		}
		else
		{				 
			 window.location='viewevents.php?';
		}	
		</SCRIPT>");	
			
	}
	
?>

 <?php
 
 	if (isset($_GET['delete']))
	{		
		include '../includes/dbconnect.php';
		$id=$_GET['bil'];		
		$sql = "DELETE FROM event WHERE Eventid ='$id'"; 
		mysqli_query($dbc,$sql) or die(mysqli_error());
		header("location: viewevents.php?");				
			
	}  
 ?>