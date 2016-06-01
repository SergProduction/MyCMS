<?
$parent_category = $_POST['id'];
if(!isset($parent_category)){$parent_category=0;}
?>
<div class="form">
<form class="product" method="post" action="block/add_element.php" enctype="multipart/form-data" target="_blank" data-id="">
<input  type="hidden" name="parent_category"  value="<? echo $parent_category?>" >
<p>введите meta title</p>
<input type="text" name="title"  value="" >
<p>введите meta keywords</p>
<input type="text" name="keywords"  value="" >
<p>введите meta descrition</p>
<input type="text" name="descrition"  value="" >
<p>введите название</p>
<input type="text" name="name"  value="" >
<p>введите описание</p>
<input type="text" name="text"  value="" >
<p>вставте картинку</p>
    <input type="file" name="filename">
<br><br>

<input type="submit" value="готово">
</form>
</div>