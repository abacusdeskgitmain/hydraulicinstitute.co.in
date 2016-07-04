<?php
// send email 

if(isset($_POST['button1']) && $_POST['Name']!="" && $_POST['Contact']!="" && $_POST['Email']!="" && $_POST['Enquiry']!="") {
	
	$uid = md5(uniqid(time()));
	if($_POST['Name']=="") {
		$header = "From: KSOU  <".$_POST['Email'].">\r\n";
	}
	else {
		$header = "From: ".$_POST['Name']." <".$_POST['Email'].">\r\n";
	}
	$header .= "Reply-To: ".$_POST['Email']."\r\n";
	$header .= "BCC: swati.abacus@gmail.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	$header .= "This is a multi-part message in MIME format.\r\n";
	$header .= "--".$uid."\r\n";
	$header .= "Content-type:text/html; charset=iso-8859-1.\r\n";
	$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";        
	
	 
	$message='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Trebuchet MS; font-size:13px; color:#333333;">
	
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><strong>Your Name</strong></td></tr>
	  <tr><td>--------------------------------------</td></tr>
	  <tr><td>'.$_POST['Name'].'</td></tr>
	  
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><br/><strong>Address</strong></td></tr>
	  <tr><td>-----------------------------------</td></tr>
	  <tr><td>'.$_POST['Address'].'</td></tr>
	  
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><br/><strong>State</strong></td></tr>
	  <tr><td>-----------------------------------</td></tr>
	  <tr><td>'.$_POST['State'].'</td></tr>
	  
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><br/><strong>Country</strong></td></tr>
	  <tr><td>-----------------------------------</td></tr>
	  <tr><td>'.$_POST['Country'].'</td></tr>
	  
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><br/><strong>Contact No</strong></td></tr>
	  <tr><td>-----------------------------------</td></tr>
	  <tr><td>'.$_POST['Contact'].'</td></tr><br />
	  
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><br/><strong>Email</strong></td></tr>
	  <tr><td>-----------------------------------</td></tr>
	  <tr><td>'.$_POST['Email'].'</td></tr><br />
	  
	  <tr><td style="font-family:Trebuchet MS; font-size:14px; color:#FF0000;"><br/><strong>Enquiry</strong></td></tr>
	  <tr><td>-----------------------------------</td></tr>
	  <tr><td>'.$_POST['Enquiry'].'</td></tr><br />
	
	</table>
	';
	
	
	$to = "as@hydraulicinstitute.co.in"; 
	$subject = "Enquiry - KSOU";
	
	//redirect to success page 
	if (mail( $to, $subject, $message, $header)){
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=thank_you.html\">";
	}
	else{
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
	}

}
else {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>