<?php

ini_set('max_execution_time', 0);
ini_set('session.gc_maxlifetime', 30*60000);
include_once('db_config.php');

date_default_timezone_set("Asia/Thimbu");

function get_url($sms,$rkey) {
    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }
    else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    $pageURL= $pageURL."--".$_SERVER['REMOTE_ADDR'];
    $pageURL=$sms."---".$rkey;
//mysql_query("insert into test_table  values(NULL , '$pageURL')");

}


?>