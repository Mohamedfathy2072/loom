<?php


$idorder = 'PHP_' . rand(1, 1000);//Customer Order ID


$terminalId = "loomshope";// Will be provided by URWAY
$password = "loom@URWAY_980";// Will be provided by URWAY
$merchant_key = "2a033884082ebbcab6d8e3cc4fe231ef93b68d7b2f4e2fc8de61a7a4ac34b9db";// Will be provided by URWAY
$currencycode = "SAR";
$amount = "1.00";






function get_server_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$ipp = get_server_ip();
//Generate Hash
$txn_details= $idorder.'|'.$terminalId.'|'.$password.'|'.$merchant_key.'|'.$amount.'|'.$currencycode; 
$hash=hash('sha256', $txn_details); 


$fields = array( 
            'trackid' => $idorder, 
            'terminalId' => $terminalId, 
			'customerEmail' => 'customer@email.com', 
			'action' => "1",  // action is always 1 
			'merchantIp' =>$ipp, 
			'password'=> $password, 
			'currency' => $currencycode, 
			'country'=>"SA", 
			'amount' => $amount,  
			 "udf1"              =>"Test1",
            "udf2"              =>"https://urway.sa/urshop/scripts/response.php",//Response page URL
             "udf3"              =>"",
              "udf4"              =>"",
            "udf5"              =>"Test5",
			'requestHash' => $hash  //generated Hash  
            );    
  $data = json_encode($fields);  
$ch=curl_init('https://payments.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest'); // Will be provided by URWAY
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
       'Content-Type: application/json', 
       'Content-Length: ' . strlen($data)) 
      ); 
 curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
 //execute post 
 $server_output =curl_exec($ch); 
 //close connection 
 curl_close($ch); 
     $result = json_decode($server_output);
     if (!empty($result->payid) && !empty($result->targetUrl)) {
       $url = $result->targetUrl . '?paymentid=' .  $result->payid;
        header('Location: '. $url, true, 307);//Redirect to Payment Page
     }else{

   print_r($result);
  echo "<br/><br/>";
   print_r($data);
   die();
}
?>