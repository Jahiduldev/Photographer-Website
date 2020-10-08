<?php
 session_start();
 include('db.php');
if(!isset($_SESSION['username'])){
?>


<script type="text/javascript">
window.location="login.php";
</script>
<?php
}

include "classes/class.phpmailer.php"; // include the class name
if(isset($_POST["send"])){
	
	$sub = $_POST["subject"];
	$body = $_POST["body"];
	
	
	
	
	
	$email=trim($_REQUEST['email']);
		$mailadd = str_replace("\r\n",' ',$email);
		$mailadd = str_replace("  ",' ',$mailadd);
	
		$finalmail= explode(' ',$mailadd);

		$n=count($finalmail);

		
				
						for ($i=0;$i<$n;$i++){
					
	
	
	
	
	
	
	$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "geo.websitewelcome.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "asad@mmservices.com.bd";
$mail->Password = "Kushtia007";
$mail->SetFrom("registration@youngbangla.org");
$mail->Subject = $sub;
$mail->Body = $body;
$mail->AddAddress($finalmail[$i]);
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{

}
$date = date('Y-m-d');
	$sql = "INSERT INTO `emailjoybangla`.`email` (`id`, `email_id`, `date`) VALUES (NULL, '$finalmail[$i]', '$date');";
	mysql_query($sql);
	}
	
	?>
	<script type="text/javascript">
	alert('Mail Sent Successfully')
	</script>
	<?php	
	}
	

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send mails </title>

<style>
.as_wrapper{
	font-family:Arial;
	color:#333;
	font-size:14px;
}
.mytable{
	padding:20px;
	border:2px solid #17A3F7;
	
}
</style>
<body>
<div class="as_wrapper">
	<h1>Send mails </h1>
    <form action="" method="post">
    <table class="mytable">
	<tr>
		<td>
		<span>Subject :</span>
		</td>
    	<td>
			<textarea rows="1" name="subject" cols="100" class="text"></textarea> 
		
		</td>
	</tr>
	<tr>
		<td>
		<span>Body :</span>
		</td>
    	<td>
		
		
		<textarea class="ckeditor" id="editor1" name="body" cols="100" rows="8"></textarea>
		</td>
	</tr>
    <tr>
		<td>
		<span>Mail ID :</span>
		</td>
    	<td>
		
		
		<textarea rows="10" name="email" cols="35" class="text"></textarea>   
		
		</td>
	</tr>
    <tr>
			<td>
		
		</td>
    	<td><span style="float:right;"><input type="submit" name="send" value="Send" /></span></td>
	</tr>
    </table>
    </form>
</div>
</body>
</html>


	<!DOCTYPE html>
<!--
Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>Data Filtering &mdash; CKEditor Sample</title>
	<script src="ckeditor.js"></script>
	<link rel="stylesheet" href="sample.css">
	<script>
		// Remove advanced tabs for all editors.
		CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
	</script>
</head>



		
	
	

		<script>

			CKEDITOR.replace( 'editor1' );

		</script>
	


