<?php
session_start();
require('../sql.php'); // Includes Login Script
require_once("../smtp/class.phpmailer.php");

$email=$_SESSION['customer_login_user'];
$res=mysqli_query($conn,"select * from custlogin where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
    $otp=rand(11111,99999);
    mysqli_query($conn,"update custlogin set otp='$otp' where email ='$email'");
	$html="Your otp verification code for Agriculture Portal is ".$otp;
	$_SESSION['farmer_login_user']= $email;
	$mailed = smtp_mailer($email, 'OTP Verification', $html); // Sending OTP email
	if ($mailed) {
        echo "yes";
    } else {
        echo "failed to send OTP";
    }
    // smtp_mailer($email,'OTP Verification',$html); 
    // echo "yes";
}
else{
    echo "not exist";
}
 
function smtp_mailer($to,$subject, $msg){
	// require_once("../smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 0; 
	$mail->SMTPAuth = TRUE; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "aayushgupta0092@gmail.com";   
    $mail->Password = "nddsgugkpiqyssjj"; 	
    $mail->SetFrom("aayushgupta0092@gmail.com");  
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>
