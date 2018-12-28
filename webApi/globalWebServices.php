<?php
require_once("../includes/dbconnect.php");

if (isset($_GET))
{
	$varFN = $_REQUEST["selectFn"];
	
	if ($varFN == "event")
	{
		//if ($_REQUEST["Eventid"] != "")
		{
			//$starStudId = $_REQUEST["Eventid"];
			$strQry = "select * from event";
			$allEvent= mysqli_query($dbc,$strQry);
			 
		}
		 
		$jsonObj = array();
		while($allEventres= mysqli_fetch_object($allEvent))
		{
			$jsonObj[]=  $allEventres;
		}
		echo json_encode($jsonObj);
	}
	
}



?>