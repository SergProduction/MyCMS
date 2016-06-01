<?php
$id = $_POST['id'];
if(empty($id)){$id=0;};

include "../bd.php";

//----------вытаскиваем товары----------

$result = mysql_query("SELECT * FROM share ORDER BY id DESC");
$x=0;
while($select = mysql_fetch_assoc($result)){
	$news[$x]= $select;
	$x++;
}
?>
<table class="table_block">
<tr>
	<td>id</td>
	<td>name</td>
	<td>text</td>
	<td>image</td>
	<td>meta title</td>
	<td>meta keywords</td>
	<td>meta description</td>
	<td></td>
	<td></td>
</tr>

<?php

for( $x=0; $x<count($news); $x++ ){
echo "<tr>";
echo "<td>".$news[$x]['id']."</td>";
echo "<td>".$news[$x]['name']."</td>";
echo "<td>".$news[$x]['text']."</td>";
echo "<td><img src=\"".$news[$x]['image']."\" class=\"admin_image\"></td>";
echo "<td>".$news[$x]['title']."</td>";
echo "<td>".$news[$x]['keywords']."</td>";
echo "<td>".$news[$x]['description']."</td>";
echo "</tr>";
};

?>

</table>