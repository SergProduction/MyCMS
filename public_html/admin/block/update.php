<?php
$id = $_POST['id'];
if(!isset($id)){$id=0;};
$type = $_POST['type'];
if(!isset($type)){$type=0;};
$checkbox = $_POST['checkbox'];
if(!isset($checkbox)){$checkbox=0;};


if($checkbox=='1'){
	$file = $_FILES['filename']['name'];

	$razmer = 10;
	$dir = dirname(__FILE__);
	$slesh = str_replace('\\','/',$dir);
  $patch = str_replace('admin/block','upload/element/',$slesh);
  $src_file = str_replace('block','css/',$slesh)."noimage.gif";
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
   

	}
?>
<?php

$name = $_POST['name'];
$text = $_POST['text'];
$price = $_POST['price'];
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$descrition = $_POST['descrition'];


if($name!='')
include "../bd.php";

if( $type == "section" ){//обновляем раздел
	mysql_query ("UPDATE category SET name='$name', text='$text', image='$src_file', title='$title', keywords='$keywords', description='$descrition' WHERE id='$id' ")or die("Ошибка вставки" . mysql_error());
}
elseif( $type == "element" ){//обновляем товар
	mysql_query ("UPDATE product SET name='$name', text='$text', price='$price', image='$src_file', title='$title', keywords='$keywords', description='$descrition' WHERE id='$id' ")or die("Ошибка вставки" . mysql_error());
}


if($name){
	echo '<script>window.close();</script>';
}
?>