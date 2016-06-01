<?php

$id = $_POST['id'];
$type = $_POST['type'];

include "../bd.php";

if( $type == "section" ){
mysql_query ("DELETE FROM category WHERE id='$id'");
mysql_query ("DELETE FROM product WHERE parent_category='$id'");
}
elseif( $type == "element" ){
mysql_query ("DELETE FROM product WHERE id='$id'");
}

?>