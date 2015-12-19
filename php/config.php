<?php
session_start();

$DB['host'] = "localhost"; 
$DB['id'] = "root"; 
$DB['password'] = "shikacooo05"; 
$DB['db'] = "ppwop"; 
$connect = mysql_connect($DB['host'], $DB['id'], $DB['password']) or die("Can't Connect MySQL Server!!");

mysql_query("SET NAMES UTF8"); 
mysql_select_db($DB['db']);

?>