<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Mail</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<script src="lib/jquery-1.4.2.js" type="text/javascript"></script>
<script src="lib/js-func.js" type="text/javascript"></script>
<script src="lib/jquery.jcarousel.js" type="text/javascript"></script>
</head>
<body>
<div id="bg">
<div id="logo"><a href="#">Mail Send </a>
		<h2><a href="http://www.mmservices.com.bd" target="_blank"></a></h2>
</div>
<div id="main">

<!-- header begins -->
      
<!-- header ends -->
<!-- content begins -->
<div id="content_bg_login">
<div id="column_box" style="padding-top:10px;padding-bottom:10px;">
		<?php

if(isset($_POST['username']))
{
	if($_POST['username']=='ab' && $_POST['password']=='ab')
	{
		$_SESSION['username']=$_POST['username'];
		$_SESSION['password']=$_POST['password'];
?>
<script type="text/javascript">
window.location="sendmail.php";
</script>
<?php		
	}
	else
	{
		echo "<h2 id='error_login'>Login error. Please try with correct username and password</h2>";
	}
}
?>

<form id="login_form" method="post" action="">
<table>
<tr>
<td>
User Name : 
</td>
<td>
<input type="text" name="username"/>
</td>
</tr>


<tr>
<td>
Password : 
</td>
<td>
<input type="password" name="password"/>
</td>
</tr>


<tr>
<td id="login_level">
Please, Login First 
</td>
<td>
<input type="submit" value="Login" />
</td>
</tr>
</table>
</form>
 </div>
<div class="clearall"></div>
   </div><div class="clearall"></div>
    </div>
<!-- content ends -->
<!-- footer begins -->

<!-- footer ends -->


</div>
</body>
</html>