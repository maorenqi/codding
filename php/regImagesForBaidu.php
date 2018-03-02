<?php
// +----------------------------------------------------------------------
// 用例：http://www.purui.cn/regImagesForBaidu.php?s=0&e=1000
// +----------------------------------------------------------------------
$path = $_SERVER['DOCUMENT_ROOT'];
$s = $_GET['s'];
$e = $_GET['e'];

$temp = file($path.'/images.txt');
echo "<ul>";
for($i=$s;$i<=$e;$i++){
	$img = preg_replace("/\/pkg/web/",'http://www.purui.cn',$temp[$i]);
	echo "<li style=\"list-style-type:none;float:left;border:1px solid #111;margin:3px;padding:5px;\">";
	echo "<a href=\"http://image.baidu.com/pcdutu?queryImageUrl=".urlencode($img)."\" target=\"_Blank\"><img src='".$img."' width=200/></a><br /><br />";
	echo "<span>".$temp[$i]."</span>";
	echo "</li>";
}
echo "</ul>";
?>