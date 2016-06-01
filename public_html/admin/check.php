<?php
// Ñêðèïò ïðîâåðêè

# Ñîåäèíÿìñÿ ñ ÁÄ
include "bd.php";

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   
    $query = mysql_query("SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysql_fetch_assoc($query);

    if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Õì, ÷òî-òî íå ïîëó÷èëîñü";
    }
    else
    {
        print "Ïðèâåò, ".$userdata['login'].". Âñž ðàáîòàåò!";
        header("Location: admin.php"); exit();
    }
}
else
{
    print "Âêëþ÷èòå êóêè";
}

?>