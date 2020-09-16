<?php 

$MerchantID = "ABCDEUAT";   // provided by billdesk
$SecurityID = "abcdeuat";   // provided by billdesk
$CheckSumKey = "ABCDE1234";  // provided by billdesk

$CustomerID = 1;
$grand_sum = 100;
$application_id = 100;
$user_id = 1;

$url_response = "/billdesk_response";

$str = trim($MerchantID).'|'.trim($CustomerID)."|NA|".trim($grand_sum)."|NA|NA|NA|INR|NA|R|".trim($SecurityID)."|NA|NA|F|".trim($application_id).'|'.trim($user_id)."|NA|NA|NA|NA|NA|".trim($url_response);

$checksum_key_new = hash_hmac('sha256',$str,$CheckSumKey, false);
$checksum_value = strtoupper($checksum_key_new);

$payment_message = trim($MerchantID).'|'.trim($CustomerID)."|NA|".trim($grand_sum)."|NA|NA|NA|INR|NA|R|".trim($SecurityID)."|NA|NA|F|".trim($application_id).'|'.trim($user_id)."|NA|NA|NA|NA|NA|".trim($url_response).'|'.trim($checksum_value);


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>FINCARE BANK - Payment Gateway</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
      
   </head>
 <BODY>


 <div class="container-fluid" style="border:5px solid dodgerblue; text-align:center;">
<form name=’abc’ method='POST' action='https://uat.billdesk.com/pgidsk/PGIMerchantPayment'>
<br>
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ7BAJ12lHGSgNY2mlk1ksnHMTbOhnIj13hIQ&usqp=CAU" alt="">
<br><br>
<input type='hidden' name='msg' value='<?php $payment_message; ?>'>

<input type='Submit' class="btn btn-success" value='Pay 10 RS'>

</form>
</div>
 </BODY>
</HTML> 