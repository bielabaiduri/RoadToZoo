	
<?php
	$conn = mysqli_connect ('localhost','root','','r2z') or die (mysqli_error());
	if ($conn==TRUE)
	{
		//echo 'success';
	}
	else
	{
		echo 'fail';
	}
?>

