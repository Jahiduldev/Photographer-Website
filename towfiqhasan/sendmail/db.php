<?php
$con = mysql_connect("localhost","root","61mmsl07");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("emailjoybangla", $con);

?>