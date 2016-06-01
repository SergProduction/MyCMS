<?php
include "../bd.php";

//--------------------
$result = mysql_query("SELECT * FROM users");
$x=0;
while($select = mysql_fetch_assoc($result)){
	$users[$x]= $select;
	$x++;
}
?>
<table class="table_block">
<tr>
	<td>id</td>
	<td>login</td>
</tr>

<?php

for( $x=0; $x<count($users); $x++ ){
echo "<tr>";
echo "<td><span data-id=\"".$users[$x]['id']."\">".$users[$x]['id']."</span></td>";
echo "<td><span>".$users[$x]['login']."</span></td>";
echo "</tr>";
}
?>
</table>
</div>
<script>
select();
</script>