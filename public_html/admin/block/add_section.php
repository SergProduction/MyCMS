<?
$file = $_FILES['filename']['name'];

$razmer = 10;
/*
$dir = dirname(__FILE__);
$slesh = str_replace('\\','/',$dir);
$patch = str_replace('admin/block','upload/element/',$slesh);
$src_file = str_replace('block','css/',$slesh)."noimage.gif";
*/
$patch = "/upload/element/";
$src_file = "css/noimage.gif";
if($_FILES["filename"]["size"] > 1024*$razmer*1024)
{
  echo ("Размер файла превышает ".$razmer." мегабайта");
  exit;
}
// Проверяем загружен ли файл
if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
{
// Если файл загружен успешно, перемещаем его
// из временной директории в конечную
move_uploaded_file($_FILES["filename"]["tmp_name"], $patch.$_FILES["filename"]["name"]);
$src_file = $patch.$_FILES["filename"]["name"];
} else {
   echo("Ошибка загрузки файла<br>");
}

$parent_category = $_POST['parent_category'];
if(!isset($parent_category)){$parent_category=0;}

$name = $_POST['name'];
$text = $_POST['text'];
$price = $_POST['price'];
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$descrition = $_POST['descrition'];

if($name!='')
include "../bd.php";

mysql_query ("INSERT INTO category (parent_category, name, text, image, title, keywords, description) VALUES('$parent_category', '$name', '$text', '$src_file', '$title', '$keywords', '$descrition')");


if($name){
  echo '<script>window.close();</script>';
}
?>