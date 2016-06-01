<?php
include "../bd.php";
// Страница регситрации нового пользователя

if(isset($_POST['login'])){

    $err = array();
	
    # проверям логин

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }
	
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }
    # проверяем, не сущестует ли пользователя с таким именем

    $query = mysql_query("SELECT COUNT(id) FROM users WHERE login='".mysql_real_escape_string($_POST['login'])."'");

    if(mysql_result($query, 0) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }
    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)
    {
        $login = $_POST['login'];

        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));

        mysql_query("INSERT INTO users SET login='".$login."', password='".$password."'");
		
        exit();
        //echo '<script>window.close();</script>';
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}

?>