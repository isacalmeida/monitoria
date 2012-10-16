<?php

$dbName = "vcash";
$dbPass = "sk78ls";
$dbUserName = "sv006027";
$host = "localhost";
$base = "452productions.com";
$path_to_config = "";
$db = mysql_connect($host, $dbUserName, $dbPass) or die ("Could not connect");
mysql_select_db($dbName,$db);
$today = gmdate ( "M d Y H:i:s" ); #This affecs how your date is displayed www.php.net/date for more info
$dir = "/src/";
$path = "/www/sv006027/www/";
?>