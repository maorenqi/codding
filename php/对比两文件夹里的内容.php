<?php
define(CHARSET,'utf-8');
header("content-Type: text/html; charset=".CHARSET);
set_time_limit(0);
$dirname='E:/www/test';
$dirname_s="E:/www/test";
$dirname_c="E:/www/test-copy";
finddir($dirname,$dirname_s,$dirname_c);
function finddir($dirName,$path_s=null,$path_c=null){
	if(file_exists($dirName)){
		$dir=opendir($dirName);
		while($fileName=readdir($dir)){
			if($fileName!='.' && $fileName!='..'){
				$file=$dirName.'/'.$fileName;
				$file_path=pathinfo($file);
				if(is_dir($file)){
					finddir($file,$path_s,$path_c);
				}else{
					$file_c=str_replace($path_s,$path_c,$file);
					/* echo $file.'<br />';
					echo $file_c.'<br />';
					echo "文件<b>".$file." </b><br /><br />"; */
					$size_s=@filesize($file);
					$size_c=@filesize($file_c);
					if($size_s!=$size_c){
						echo "文件<b>".$file."size_s:########".$size_s."#####</b><br /><b>fiile_c:".$file_c."size_c:$$$$$".$size_c."$$$$$$$$$</b><br><br />";
					} 
					//search_file($file);
				}
			}
		}
	closedir($dir);
	
	
	}

}

function get_content($file){
	$content = @file_get_contents($file);
	return $content;
}

function put_content($file,$cur){
	 file_put_contents($file,$cur);
	
}

function done($file){
echo '<p ><a style="color:red;" href="'.$file.'" target="_blank">'.$file.'.........................................OK</a></p>';
return true;
}

function fail($file){
	echo '<p><a style="color:black;" href="'.$file.'" target="_blank">'.$file.'........................search fail!</a></p>';
}

function search_file($file){
	echo '<p><a href="'.$file.'" style="color:red;" target="_blank">'.$file.'</a></p>';
}
function result_suc(){
	echo '<p style="color:red;">处理完毕!</p>';
	return true;
}

?>