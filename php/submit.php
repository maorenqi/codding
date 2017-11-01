<?php
$info=array();

if(isset($_GET['name'])){
$ab='g';
$text=$_GET['name'];
$arr=array(430,670);
$info['body']=array('name'=>$text);
}else{
$ab='p';
$text=$_POST['name'];
$arr=array(430,700);
$info['body']=$_POST;
}

if(empty($text)){$text='普瑞小天使';}

if(isset($_GET['h'])&&is_numeric($_GET['h'])){
	$info['h']=$_GET['h'];
}else{
	$info['h']=1;
}

$img='img/'.$info['h'].'_'.$ab.'.png';

if(!file_exists($img)){exit('!file_exists');}

$info['ip']=$_SERVER['REMOTE_ADDR'];
$info['agent']=$_SERVER['HTTP_USER_AGENT'];

$dst = imagecreatefromstring(file_get_contents($img));
//打上文字
$font = 'ttf/'.rand(1,7).'.ttf';//字体
$black = imagecolorallocate($dst, 0, 0, 0);//字体颜色
//字体大小 旋转角度 宽开始 高开始
//imagefttext($dst, 22, 10, $arr[0]-180, $arr[1]-30, $black, $font, '本人已确认以上信息属实！');
imagefttext($dst, 22, 0, $arr[0], $arr[1], $black, $font, $text);
imagefttext($dst, 22, 0, $arr[0], $arr[1]+44, $black, $font, date("Y.m.d"));
//输出图片
//header('Content-Type: image/jpeg');
$file=uniqid(md5($text));
$info['file']=$file;
imagejpeg($dst,'photo/'.$file);
imagedestroy($dst);

$info['time']=time();

file_put_contents("data/$file",json_encode($info));

header("location:my.php?my=$file");
exit();
?>