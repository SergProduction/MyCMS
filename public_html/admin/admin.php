<?php
include "bd.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   
    $query = mysql_query("SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);

    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
        header("Location: index.php"); exit();
    }
    else
    {
        //print "Привет, ".$userdata['login'].". Всё работает!";
    }
}
else
{
    header("Location: index.php"); exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="js/1.js"></script>
</head>
<body>
  <div class="wrapper">
    <div class="left">
    <a href="../index.php">на главную</a>
    <a href="" onclick="del_cook()">выйти</a>
    <hr>
    	<ul>
    		<li><span data-val="block">Инфоблоки</span></li>
    		<li><span data-val="users">Пользователи</span></li>
    		<li><span data-val="news">Новости</span></li>
    		<li><span data-val="shares">Акции</span></li>
    		<li><span data-val="contacts">Контактные данные</span></li>
    	</ul>
    </div>
    <div id="right" class="right">
			
    </div>
  </div>
</body>
</html>