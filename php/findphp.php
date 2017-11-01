<?php

$dirname='./';
finddir($dirname);
function finddir($dirName){
	if(file_exists($dirName)){
		$dir=opendir($dirName);
		while($fileName=readdir($dir)){
			//if($fileName!="." && $fileName!=".." && $fileName!="include" && $fileName!="plus"&& $fileName!="data"){
			if($fileName!="." && $fileName!=".."){
				$file=$dirName.'/'.$fileName;
				$file_path = pathinfo($file);
				//echo $file;
				if(is_dir($file)){
					finddir($file);//递归删除
				}elseif($file_path[extension]=='js'){
				
					echo "文件<b>".$file."</b><br>";
					//unlink($file);
				}
			}
		}
		closedir($dir);
		//echo "目录<b>".$dirName."</b><br>";
		//rmdir($dirName);	
	}
	
	
}