<?php 

	
	
	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'notification' => $message
			);
		$headers = array(
			'Authorization:key = AAAAJbBpQfg:APA91bFA4U74nOW1W0RskNupJIL30tTrhpmDUQfF-FpkZ1ZY30HCyk4I7Gcmlq8JvDw3O0zirGFQ7XDNfIBP3XlGXJ3-kMfKMRRj1bN8hx_VSpLGqQr5QzA339lQBSiL_SzYd7xQa-CF',
			'Content-Type: application/json'
			);
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}
	
	/*$conn = mysqli_connect("localhost","root","","r2z");
	$sql = " Select Token From StoreToken";
	$result = mysqli_query($conn,$sql);
	$tokens = array();
	if(mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}
	mysqli_close($conn); */
	$tokens[] = "eWsL6zwZrEY:APA91bEt_5wWdBUjbxqUPcBRfAJfrqTaVWutLYmYpoC_iKMFGltqgQ_M3j5bVxWBfJzHLNoZJuH_1ln-emswTPKWyUL_sMV4zbwAbAT0t8xw7us1fUjmLX_Qo-rwgPqobg60U3TcuvbF";
	$messagePush = array(
		"title" => "Road To Zoo",
		"body" => "New Events", 
	);
	$message_status = send_notification($tokens, $messagePush);
	 $message_status;
 ?>