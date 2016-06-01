<form class="product" method="post" action="news/add_news.php" enctype="multipart/form-data" target="_blank" data-id="">

<input  type="hidden" name="parent_category"  value="<? echo $parent_category?>" >
<p>введите meta title</p>
<input type="text" name="title"  value="" >
<p>введите meta keywords</p>
<input type="text" name="keywords"  value="" >
<p>введите meta descrition</p>
<input type="text" name="descrition"  value="" >
<p>введите название</p>
<input type="text" name="name"  value="" >
<p>краткое описание</p>
<textarea name="text" rows="5" cols="45"></textarea>
<p>подробное описание</p>
<textarea name="text_detail"  rows="5" cols="45"></textarea>
<p>вставте картинку</p>
    <input type="file" name="filename">
<br><br>

<input type="submit" value="добавить">
</form>