<?php
/**
*删除目录及目录下所有文件或删除指定文件
*@param str $path 待删除目录路径
*@param int $delDir  是否删除目录，1或true删除目录，0或false 则只删除文件保留目录（包含子目录）
*@return bool 返回删除状态
**/
function delDirAndFile($path, $delDir = FALSE){
	$handle = opendir($path);
	if($handle){
		while (false !== ($item=readdir($handle))){
			if ($item !="." && $item != "..")
				is_dir("$path/$item")?delDirAndFile("$path/$item",$delDir):unlink("$path/$item");
		}
		closedir($handle);
		if($deldir)
			return rmdir($path);
	}else{
		if(file_exists($path){
			return unlink($path);
		}else{
			return false;
		}
	}
}

delDirAndFile('./web'.true);