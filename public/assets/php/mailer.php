 <?php 
session_start();
	error_reporting(0);
	date_default_timezone_set("Asia/Kolkata");
	$email_to='chsvk21@gmail.in';
	$emailfrom = 'chsvk21@gmail.in';

	$name = $_REQUEST['name']; // required
	$email_from= $_REQUEST['email'];
	$res_phone = $_REQUEST['mobile'];

	
	$email_subject='Enquiry from '.$name;
	$myIP = getenv("REMOTE_ADDR");
	$myDate = date('r');
	$date = date ("l, F jS, Y h:i A"); 
	$country = "";
	
	
	function clean_string($string) {
		  $bad = array("content-type","bcc:","to:","cc:","href");
		  return str_replace($bad,"",$string);
		}
		//date_default_timezone_set("Asia/Calcutta");

		$email_message = "<font face='Century Gothic' style='font-size:14px;'>Dear Team,<br /><br />
	Please go through the below enquiry which was posted on " . date('d-m-Y h:i:s A') ."<br>
	The details of the enquiry is:<br /><br />";
		$email_message .= "<b>Name : : </b>".$name."<br />";
		$email_message .= "<b>Email Address : : </b>".$email_from."<br />";
		$email_message .= "<b>Contact Number : : </b>".$res_phone."<br />";
		$email_message .= "<b>Page : : </b>".$page."<br />";
		$email_message .= "<b>Message : : </b>".$message."<br />;
	</font>";
		$headers = 'From: '.$emailfrom."\r\n".
		'Reply-To: '.$emailfrom."\r\n" .
		'X-Mailer: PHP/' . phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .='Content-type:text/html; charset=iso-8859-1' ."\r\n";
	$valu=mail($email_to, $email_subject, $email_message, $headers);
	if($valu)
	{
		//echo 'Your Details has been submitted Sucessfully. We will get back to you shortly';
		//echo '<script>alert("Thank you for contacting us. We will check availability and get back to you.");window.location="index.html"</script>';
		echo '<script>window.location="thankyou.html"</script>';
		//echo "suc";
		
	}
	else
	{
		// echo 'Because of Technical Issue We can not send your mail right now. please try again after some time';
		echo '<script>window.location="index.html"</script>';
		//echo "mailerr";
	}


?>
