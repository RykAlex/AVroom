<?php
$nm=$_POST['username'];
$em=$_POST['useremail'];
$sub=$_POST['usersubject'];
$comp=$_POST['usercompany'];
$msg=$_POST['usermessage'];
if(trim($nm)!="Your Name" && trim($em)!="Your Email" && trim($sub)!="Your Subject" && trim($comp)!="Your Company" && trim($msg)!="Your Message" && trim($nm)!="" && trim($em)!="" && trim($sub)!="" && trim($comp)!="" && trim($msg)!="")
{
	if(filter_var($em, FILTER_VALIDATE_EMAIL))
	{
		$message='
		<div style="background-color: #F5F5F5; padding: 60px; margin-bottom: 40px; border-radius: 100px 0 100px 0; border-bottom: 3px solid #eaeaea;">
			<p style="font-size: 16px; margin-bottom:30px;">User sent a query having email id as '.$em.' </p>
			
			<p style="font-size: 16px; margin-bottom:0px; font-weight:600;">Name -</p>
			<p style="font-size: 13px; margin-bottom:30px; margin-top: 0;">'.$nm.' </p>
			
			<p style="font-size: 16px; margin-bottom:0px; font-weight:600;">Subject -</p>
			<p style="font-size: 13px; margin-bottom:30px; margin-top: 0;"">'.$sub.' </p>
			
			<p style="font-size: 16px; margin-bottom:0px; font-weight:600;">Coumpny -</p>
			<p style="font-size: 13px; margin-bottom:30px; margin-top: 0;""> '.$comp.' </p>
			
			<p style="font-size: 16px; margin-bottom:0px; font-weight:600;">Message -</p>
			<p style="font-size: 13px; margin-bottom:30px; margin-top: 0;""> '.$msg.' </p>
		</div>
		';
		
		$message_user='
		<div style="background-color: #F5F5F5; padding: 60px; margin-bottom: 40px; border-radius: 100px 0 100px 0; border-bottom: 3px solid #eaeaea;">
			<p style="font-size: 16px; margin-bottom:20px;">Hi,</p>
			
			<p style="font-size:25px; font-weight:bold; color:#36434d; margin-bottom:20px;">Welcome to Fixit 1.0!</p>
			
			<p style="font-size: 16px; margin-bottom:20px;">Thank you for your subscription.</p>
			
			<p style="font-size: 16px; margin-bottom:20px;">Please note that you can invite visitors to subscribe by adding a Signup form to your shoutout newsletter.</p>
			
			<p style="font-size: 16px; margin-bottom:20px;">If you have any further questions, please let us know. and send your feedback to <a style="color:#18b870; font-weight:bold;" href="mailTo:support@fixit.com">support@fixit.com</a></p>
			
			<p style="font-size: 16px;">Have a good day!</p>
		</div>
		';
		
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <support@himanshusofttech.com>' . "\r\n";

		if(mail('support@himanshusofttech.com','New user for Fixit',$message,$headers ))
		{
		mail($em,'Thanks for the Fixit subscription',$message_user,$headers );
			
		echo '1#Mail has been sent successfully.';
		}
		else
		{
		echo '4#Please, Try Again.';
		}
	}
	else
		echo '3#Please, provide valid Email.';
}
else
{
echo '2#Please, fill all the details.';
} 
?>