<html>
<head>
<title>Send Message</title>
</head>
<body>
<form method="post">
<h1>Send Message to Mobile Number</h1>
<p>Enter Number: </p>
<input type="phone" name="number">
<p>Enter Message: </p>
<textarea rows=6 cols=5 name="msg"></textarea><br>
<input type=submit name="sendmsg">
</form>
</body>
</html>

<?php
$authKey = "272358ATuHBbE0BnO5cb30c27";
$senderId = "Hideme";
if(isset($_POST['sendmsg']))
{
$mobileNumber = $_POST['number'];
$msg= $_POST['msg'];
$message = urlencode($msg);
//$route = "default";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    //'route' => $route
);
$url="http://api.msg91.com/api/sendhttp.php";

$ch = curl_init($url);
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));

//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo '<script> alert("Your message has been sent to '.$mobileNumber.' successfully ");</script>';

}

?>