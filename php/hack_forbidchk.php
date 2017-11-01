<?php 
//查询禁止IP 
$ip =$_SERVER['REMOTE_ADDR']; 
$fileht=".htaccess2"; 
if(!file_exists($fileht))file_put_contents($fileht,""); 
$filehtarr=@file($fileht); 
if(in_array($ip."\r\n",$filehtarr))die("Warning:"."<br>"."Your IP address are forbided by Mydalle.com Anti-refresh mechanism, IF you have any question Pls emill to shop@mydalle.com!<br>(Mydalle.com Anti-refresh mechanism is to enable users to have a good shipping services, but there maybe some inevitable network problems in your IP address, so that you can mail to us to solve.)"); 


//加入禁止IP 
$time=time(); 
$fileforbid="log/forbidchk.dat"; 

if(file_exists($fileforbid)) 
{ if($time-filemtime($fileforbid)>30)unlink($fileforbid); 
else{ 
$fileforbidarr=@file($fileforbid); 
if($ip==substr($fileforbidarr[0],0,strlen($ip))) 
{ 
if($time-substr($fileforbidarr[1],0,strlen($time))>120)unlink($fileforbid); 
elseif($fileforbidarr[2]>120){file_put_contents($fileht,$ip."\r\n",FILE_APPEND);unlink($fileforbid);} 
else{$fileforbidarr[2]++;file_put_contents($fileforbid,$fileforbidarr);} 
} 
} 
} 

//防刷新 
$str=""; 
$file="log/ipdate.dat"; 
if(!file_exists("log")&&!is_dir("log"))mkdir("log",0777); 
if(!file_exists($file))file_put_contents($file,""); 
$allowTime = 60;//防刷新时间 
$allowNum=5;//防刷新次数 
$uri=$_SERVER['REQUEST_URI']; 
$checkip=md5($ip); 
$checkuri=md5($uri); 
$yesno=true; 
$ipdate=@file($file); 
foreach($ipdate as $k=>$v) 
{ $iptem=substr($v,0,32); 
$uritem=substr($v,32,32); 
$timetem=substr($v,64,10); 
$numtem=substr($v,74); 
if($time-$timetem<$allowTime){ 
if($iptem!=$checkip)$str.=$v; 
else{ 
$yesno=false; 
if($uritem!=$checkuri)$str.=$iptem.$checkuri.$time."1\r\n"; 
elseif($numtem<$allowNum)$str.=$iptem.$uritem.$timetem.($numtem+1)."\r\n"; 
else 
{ 
if(!file_exists($fileforbid)){$addforbidarr=array($ip."\r\n",time()."\r\n",1);file_put_contents($fileforbid,$addforbidarr);} 
file_put_contents("log/forbided_ip.log",$ip."--".date("Y-m-d H:i:s",time())."--".$uri."\r\n",FILE_APPEND); 
$timepass=$timetem+$allowTime-$time; 
die("Warning:"."<br>"."Pls don't refresh too frequently, and wait for ".$timepass." seconds to continue, IF not your IP address will be forbided automatic by Mydalle.com Anti-refresh mechanism!<br>(Mydalle.com Anti-refresh mechanism is to enable users to have a good shipping services, but there maybe some inevitable network problems in your IP address, so that you can mail to us to solve.)"); 
} 
} 
} 
} 
if($yesno) $str.=$checkip.$checkuri.$time."1\r\n"; 
file_put_contents($file,$str); 
?> 