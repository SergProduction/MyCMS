<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CREATE DATABASE sergcms</title>
</head>
<body>
<?php

$link = mysql_connect('localhost', 'serg', '1234');
if (!$link) {
  die('Ошибка соединения: '.mysql_error());
}
mysql_select_db('pirogcms', $link) or die(;

  $sql = CREATE DATABASE pirogcms;
  if (mysql_query($sql, $link)) {
      echo "База pirogcms успешно создана\n";
  } else {
      echo Ошибка при создании базы данных:  . mysql_error() . "\n";
  }
)
mysql_query("CREATE TABLE category (id INT(6) auto_increment primary key, parent_category INT(6), name VARCHAR(254), text TEXT(10000), image TEXT(2000), title VARCHAR(254), keywords VARCHAR(254), description VARCHAR(254) ) ") or die(mysql_error());

mysql_query("CREATE TABLE product (id INT(6) auto_increment primary key, parent_category INT(6), name VARCHAR(254), text TEXT(10000), image TEXT(2000), title VARCHAR(254), keywords VARCHAR(254), description VARCHAR(254) ) ");

mysql_query("CREATE TABLE news (id INT(6) auto_increment primary key, parent_category INT(6), name VARCHAR(254), text TEXT(1000), detail_text TEXT(10000), image TEXT(2000), title VARCHAR(254), keywords VARCHAR(254), description VARCHAR(254) ) ");

mysql_query("CREATE TABLE shares (id INT(6) auto_increment primary key, parent_category INT(6), name VARCHAR(254), text TEXT(1000), detail_text TEXT(10000), image TEXT(2000), title VARCHAR(254), keywords VARCHAR(254), description VARCHAR(254) ) ");

mysql_query("CREATE TABLE contacts (id INT(6) auto_increment primary key, site VARCHAR(254), name VARCHAR(254), adres TEXT(10000), mail_my VARCHAR(254), mail_site VARCHAR(254), tel1 VARCHAR(254), tel2 VARCHAR(254), tel3 VARCHAR(254) ) ");

mysql_query("CREATE TABLE users (id INT(6) auto_increment primary key, login VARCHAR(254), password VARCHAR(254), hash VARCHAR(254), type VARCHAR(254) ) ");
?>
</body>
</html>