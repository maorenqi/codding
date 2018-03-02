<?php
set_time_limit(0);
$path = $_SERVER['DOCUMENT_ROOT'];

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
imgdir($path);
function imgdir($path){
	global $DOCUMENT_ROOT;
	$temp = scandir($path);
	
	foreach($temp as $k=>$v){
		if($v=='.' || $v=='..'){
			continue ;
		}
		
		if(is_dir($path.'/'.$v)){
			imgdir($path.'/'.$v);
		}elseif(preg_match('/(jpg|png|jpeg|bmp|gif)/',$v)){
			file_put_contents($DOCUMENT_ROOT.'/images.txt',$path.'/'.$v."\r\n",FILE_APPEND);
		}else{
			continue ;
		}
	}
}


?>