<?php
/* $str = "112是"; 
if (preg_match("/[\x7f-\xff]/", $str)) { 
echo "含有中文"; 
}else{ 
echo "没有中文"; 
} 

//查找目录下中文命名的文件 */
//tree('/pkg/web/www.prykweb.com/hospital/html/p0371');
function tree($directory) 
{ 
	$mydir=dir($directory); 
	echo "<ul>\n"; 
	while($file=$mydir->read()){ 
		if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")) 
		{
		//	echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n"; 
			tree("$directory/$file"); 
		} elseif(preg_match("/[\x7f-\xff]/", $file)){
			echo "<li>$directory/$file</li>\n"; 
		}	
		 elseif(preg_match("/[\x7f-\xff]/", $directory)){
			echo "<li>$directory</li>\n"; 
		}	
	} 
	echo "</ul>\n"; 
	$mydir->close(); 
} 

//根据域名显示IP
$dm=array(
				'www.purui.cn',
				'www.p0931.com',
				' ',
);	
//showIp($dm);
function showIp($dm){
	foreach($dm as $v){
		echo $v.'  IP IS:   <font color=\'red\'>'.gethostbyname($v).'</font><br /><hr>';
	}
}

/******************************************
 获取数组的XML结构
string array2xml(array $arr, [int $level]); 
*****************************************/
function array2xml($arr, $level = 1) {
	$s = $level == 1 ? "<xml>" : '';
	foreach ($arr as $tagname => $value) {
		if (is_numeric($tagname)) {
			$tagname = $value['TagName'];
			unset($value['TagName']);
		}
		if (!is_array($value)) {
			$s .= "<{$tagname}>" . (!is_numeric($value) ? '<![CDATA[' : '') . $value . (!is_numeric($value) ? ']]>' : '') . "</{$tagname}>";
		} else {
			$s .= "<{$tagname}>" . array2xml($value, $level + 1) . "</{$tagname}>";
		}
	}
	$s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s);
	return $level == 1 ? $s . "</xml>" : $s;
}

/******************************************
示例
$result = array2xml(array('TagName' => 'A'));
print_r($result);    //  <xml><TagName><![CDATA[A]]></TagName></xml>
 ******************************************/

/******************************************
字符串加密或解密
string authcode(string $string, [string $operation], [string $key], [int $expiry]);
******************************************/
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key != '' ? $key : $GLOBALS['_W']['config']['setting']['authkey']);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya . md5($keya . $keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for ($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for ($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for ($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if ($operation == 'DECODE') {
		if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc . str_replace('=', '', base64_encode($result));
	}

}
/******************************************
 示例：加密
echo authcode('hello-world', 'ENCODE');    //  b3ae8oQNH91yF4oshY+8PiBuoSfDSrwoWzYrrmpyIG03c6B3FYFlCA 
解密
echo authcode('f56bHdyiXR8ZmKXDC/VmUoRkpyICJQ8BVALqpw8nTZi+Itjrw1g26Q');
 ******************************************/
 

/******************************************
 格式化显示文件大小
string sizecount(int $size); 
******************************************/
function sizecount($size) {
	if($size >= 1073741824) {
		$size = round($size / 1073741824 * 100) / 100 . ' GB';
	} elseif($size >= 1048576) {
		$size = round($size / 1048576 * 100) / 100 . ' MB';
	} elseif($size >= 1024) {
		$size = round($size / 1024 * 100) / 100 . ' KB';
	} else {
		$size = $size . ' Bytes';
	}
	return $size;
}
/******************************************
 示例
echo sizecount(1024 * 1024 * 1024);    //  1 GB
******************************************/

/******************************************
 获取指定目录下所有文件路径
array file_tree(string $path); 
******************************************/
function file_tree($path) {
	$files = array();
	$ds = glob($path . '/*');
	if (is_array($ds)) {
		foreach ($ds as $entry) {
			if (is_file($entry)) {
				$files[] = $entry;
			}
			if (is_dir($entry)) {
				$rs = file_tree($entry);
				foreach ($rs as $f) {
					$files[] = $f;
				}
			}
		}
	}
	return $files;
}
/******************************************
示例
$files = file_tree('E:\phpStudy\WWW\GitHub\project1');
echo '<pre/>';
print_r($files); 
******************************************/

