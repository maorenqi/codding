<?php
Ob_end_flush();
header ("Content-type: image/png");
$im = @imagecreate (200, 100)
or die ("无法创建图像");
$background_color = imagecolorallocate ($im, 0,0, 0);
$text_color = imagecolorallocate ($im, 230, 140, 150);
imagestring ($im, 3, 30, 50, "www.pc811.com", $text_color);
imagepng ($im);
?>