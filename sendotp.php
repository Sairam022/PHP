<html>
<head>
<title>Send OTP </title>
</head>
<body>
<form action="sendotp.php" method="post">
Phone Number : <input type="phone" name="number">
<button type="submit" name="sendotp">Send OTP </button>
</form>
</body>
</html>

<?php
$authKey = "272358ATuHBbE0BnO5cb30c27";
$senderId = "611332";
if(isset($_POST['sendotp']))
{
	$mobileNumber = $_POST['number'];
	$message = "Testing OTP: Your verification code is ##OTP##. ";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
);

//API URL
$url="http://control.msg91.com/api/sendotp.php";

$curl = curl_init($url);

curl_setopt_array($curl, array(
 // CURLOPT_URL => "http://control.msg91.com/api/sendotp.php?otp_length=&authkey=&message=&sender=&mobile=&otp=&email=&otp_expiry=&template=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $postData,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}
 else 
{
  echo '<script> alert("Your OTP has been Sent Successfully");</script>'.$response;
}

}

?>