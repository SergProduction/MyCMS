<?php

$name_server = "localhost";
$user = "serg";
$password = "1234";
$name_baza = "pirogcms";
$db = mysql_connect($name_server,$user,$password) or die("Неверные данные для соединения: " . mysql_error());
mysql_select_db($name_baza, $db);
mysql_query("SET NAMES utf8");
?>
