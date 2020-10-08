<?php
session_start(); 
$_SESSION['login']=false;
$_SESSION['member_id']="";
$_SESSION['personal_no']="";
$_SESSION['group_no']="";
header('Location: index.php');

?>
