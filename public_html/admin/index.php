<?php
include "bd.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
    $query = mysql_query("SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);

    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }
    else
    {
        print "Привет, ".$userdata['login'].". Всё работает!";
		header("Location: admin.php"); exit();
    }
}


// Страница авторизации

# Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}

if(isset($_POST['login'])){

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT id, password FROM users WHERE login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    # Сравниваем пароли

    if($data['password'] === md5(md5($_POST['password']))){

        # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));

	/*	if(!@$_POST['not_attach_ip'])

        {
            # Если пользователя выбрал привязку к IP
            # Переводим IP в строку

            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }
	*/
        # Записываем в БД новый хеш авторизации и IP

        mysql_query("UPDATE users SET hash='".$hash."' ".$insip." WHERE id='".$data['id']."'");

        # Ставим куки

        setcookie("id", $data['id']);

        setcookie("hash", $hash);

        # Переадресовываем браузер на страницу проверки нашего скрипта

        header("Location: check.php"); exit();
    }
    else
    {
		$err = "Вы ввели неправильный логин/пароль</span><br>";
    }
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Загрузка файлов на сервер</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
<style>
body{
	margin:0;
	padding:0;
	width:100%;
	height:100%;
	background: #e2e2e2;
    background: -moz-radial-gradient(top, #FFFFFF 0%, #252525);
    background: -webkit-radial-gradient(top, #FFFFFF 0%,#252525);
    background: -o-radial-gradient(top, #FFFFFF 0%,#252525);
    background: radial-gradient(top, #FFFFFF 0%,#252525);
	background: -ms-radial-gradient(top, #FFFFFF 0%, #252525)
}
#autorization {
    border-style: solid;
    border-radius: 5px;
    padding: 10px;
    margin: 30px auto;
    width: 250px;
    background-color: F5F5F5;
    text-align: center;
}
#autorization span {
    color: #f00;
}
</style>
</head>
<body>
<div id="autorization">

<span><? if(isset($err))print $err;?></span>
<form method="POST">
<p>Логин</p>
<input name="login" type="text"><br>
<p>Пароль</p>
<input name="password" type="password"><br>
<br>
<input name="submit" type="submit" value="Войти">
</form>
</div>
<body>
</html>