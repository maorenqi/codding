<?php
$file = 'index.html';
$str = file_get_contents($file);
$text = 'href="http://plt.zoosnet.net/LR/Chatpre.aspx?id=PLT64903050"';
$str = preg_replace('/href\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^"\'>\s]+))/', $text, $str); 
if(file_put_contents($file,$str)){
echo "change url success";
}
/* 
function rewrite_url($fid, $fname) {
    return '<a href="index-fid'.$fid.'-fname'.$fname.'-lm2.html"'.'>';
}
 
$searcharray[] = "/\<a href\=\"\/index\.php\?fid=(\d+)&fname\=([^&]+?)(&amp;mark\=&amp;lm\=2)
 
\"([^\>]*)\>/e";
$replacearray[] = "rewrite_url('\\1', '\\2')";
$content = preg_replace($searcharray, $replacearray, $content);
 */