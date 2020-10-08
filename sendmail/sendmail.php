<?php
 session_start();
 
if(!isset($_SESSION['username']))
?>

<!DOCTYPE html>
<!--
Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>Mail send</title>
	<script src="ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
	
	

</head>
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
<?php


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
					
	
	

$email=  'asadulkabir007@gmail.com';
$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= "From: <$email>" . "\r\n";



 mail($finalmail[$i],$sub,$body,$headers);
 if($a==1000){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{

}


	}
	
	?>
	<script type="text/javascript">
	alert('Mail Sent Successfully')
	</script>
	<?php	
	}
	

?>
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
		
		
		<textarea id="editor" name="body" cols="100" rows="8"></textarea>
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

<script>
	initSample();
</script>

</body>
</html>


