<?php
$id = $_POST['id'];
if(!isset($id)){$id=0;};

include "../bd.php";

//----------вытаскиваем разделы----------
$result = mysql_query("SELECT * FROM category WHERE parent_category='$id'");
$x=0;
while($select = mysql_fetch_assoc($result)){
	$category[$x]= $select;
	$x++;
}

//----------вытаскиваем товары----------

$result = mysql_query("SELECT * FROM product WHERE parent_category='$id'");
$x=0;
while($select = mysql_fetch_assoc($result)){
	$product[$x]= $select;
	$x++;
}

//----------вытаскиваем разделы----------
$result = mysql_query("SELECT * FROM category WHERE id='$id'");
$x=0;
while($select = mysql_fetch_assoc($result)){
	$parent[$x]= $select;
	$x++;
}
?>

<table class="table_block">
<tr>
	<td>id</td>
	<td>название</td>
	<td>описание</td>
	<td>изображение</td>
	<td>цена</td>
	<td>meta title</td>
	<td>meta keywords</td>
	<td>meta description</td>
	<td></td>
	<td></td>
</tr>
<?
if($id != 0){
	echo "<td>../</td>";
	echo "<td><span data-val=\"block/sel_section\" data-id=\"".$parent[0]['parent_category']."\">назад</span></td>";
	for( $y=0; $y<8; $y++ ){
		echo "<td></td>";
	}
}
for( $x=0; $x<count($category); $x++ ){
echo "<tr>";
echo "<td>".$category[$x]['id']."</td>";
echo "<td><img src=\"css/section.png\" class=\"folder\" data-id=\"".$category[$x]['id']."\"><span>".$category[$x]['name']."</span></td>";
	for( $y=0; $y<6; $y++ ){
		echo "<td></td>";
	}
echo "<td><img src=\"css/edit.png\" class=\"icon\" data-val=\"edit\" data-id=\"".$category[$x]['id']."\" data-type=\"section\"></td>";
echo "<td><img src=\"css/delete.png\" class=\"icon\" data-val=\"delete\" data-id=\"".$category[$x]['id']."\" data-type=\"section\"></td>";
echo "</tr>";
};

for( $x=0; $x<count($product); $x++ ){
echo "<tr>";
echo "<td>".$product[$x]['id']."</td>";
echo "<td>".$product[$x]['name']."</td>";
echo "<td>".$product[$x]['text']."</td>";
echo "<td><img class=\"admin_image\" src=\"".$product[$x]['image']."\"></td>";
echo "<td>".$product[$x]['price']."</td>";
echo "<td>".$product[$x]['title']."</td>";
echo "<td>".$product[$x]['keywords']."</td>";
echo "<td>".$product[$x]['description']."</td>";
echo "<td><img src=\"css/edit.png\" class=\"icon\" data-val=\"edit\" data-id=\"".$product[$x]['id']."\" data-type=\"element\"></td>";
echo "<td><img src=\"css/delete.png\" class=\"icon\" data-val=\"delete\" data-id=\"".$product[$x]['id']."\" data-type=\"element\"></td>";
echo "</tr>";

}
?>

</table>
<div id="body"></div>
<script>
	edit_del();
	vib_panel();
</script>