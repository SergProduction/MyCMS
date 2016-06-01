<?php
$id = $_POST[id];
if(empty($id)){$id=0;};
$type = $_POST[type];
if(empty($type)){$type=0;};

include "../bd.php";

if($type=="section"){
	//----------вытаскиваем раздел----------
	$result = mysql_query("SELECT * FROM category WHERE id='$id'");
	$x=0;
		while($select = mysql_fetch_assoc($result)){
		$who[$x]= $select;
		$x++;
		}
}
elseif($type=="element"){
	//----------вытаскиваем товар----------
	$result = mysql_query("SELECT * FROM product WHERE id='$id'");
	$x=0;
		while($select = mysql_fetch_assoc($result)){
		$who[$x]= $select;
		$x++;
		}
}

?>
<div class="form">
<form class="product" method="post" action="block/update.php" enctype="multipart/form-data" target="_blank" data-id="">
<input  type="hidden" name="id"  value="<? echo $id; ?>" >
<input  type="hidden" name="type"  value="<? echo $type; ?>" >
<p>meta title</p>
<input type="text" name="title"  value="<? echo $who[0]['title']; ?>" >
<p>meta keywords</p>
<input type="text" name="keywords"  value="<? echo $who[0]['keywords']; ?>" >
<p>meta descrition</p>
<input type="text" name="descrition"  value="<? echo $who[0]['description']; ?>" >
<p>название</p>
<input type="text" name="name"  value="<? echo $who[0]['name']; ?>" >
<p>описание</p>
<input type="text" name="text"  value="<? echo $who[0]['text']; ?>" >
<?php
if( $type == "section"){
	echo "<p>детальное описание</p>";
	echo "<input type=\"text\" name=\"text_detail\"  value=\"".$who[0]['text_detail']."\" >";

}
elseif( $type == "element"){
	echo "<p>цена</p>";
	echo "<input type=\"text\" name=\"price\"  value=\"".$who[0][price]."\" >";
}

?>
<p>вставте картинку</p>
    <input type="file" name="filename"><br>
	<input type="checkbox" name="checkbox" value="1" id="check"><label for="check">удалить старое изображение</label>
<br><br>

<input type="submit" value="готово">
</form>
</div>

<script>
vib_panel();
</script>