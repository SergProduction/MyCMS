<?
$dir = dirname(__FILE__);
$slesh = str_replace('\\','/',$dir);
$patch = str_replace('admin/block','upload/element/',$slesh);
$src_file = str_replace('block','css/',$slesh)."noimage.gif";
$matches = explode("/", $patch);
echo $patch;
echo "<br>";
echo $src_file;
echo "<br>";
print_r($matches);
echo count($matches);
$ty = count($matches) - 2;
echo $matches[$ty];
?>