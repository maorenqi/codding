<?php
define('PC_PATH', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);

if(!defined('PHPCMS_PATH')) define('PHPCMS_PATH', PC_PATH);

$ftp_server = "116.28.63.207";
$ftp_port = '21';
$ftp_user ='ftpp0371';
$ftp_pass = 'P0371(*&';

$remote = '/pkg/web/www.p0371.com/webroot/n/test.html';
$local = './test.html';
// set up a connection or die
$conn_id = ftp_connect($ftp_server,$ftp_port) or die("Couldn't connect to $ftp_server");

if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    //echo "Connected as $ftp_user@$ftp_server\n";
	if (@ftp_chdir($conn_id,'/statics/css')){
		echo 'ok';
	} else {
		echo 'fail';
	}
	/*
		if(ftp_mkdir($conn_id,$path)){
			echo 'ok';
		}else{
			echo 'false';
		}*/
	//$dirname = pathinfo($remote,PATHINFO_DIRNAME);
	if(ftp_put($conn_id , $remote, $local, FTP_BINARY)){
		echo 'ok';
	}else{
		echo 'fail';
	}


	
} else {
    echo "Couldn't connect as $ftp_user\n";
}
/*
function check_file($id,$d){
	if(is_array($dir = @ftp_rawlist($id,$d))){
		$items = array(); 
            foreach ($dir as $child) { 
                $chunks = preg_split("/\s+/", $child); 
				
				if($chunks['8'] != '.' && $chunks['8'] != '..'){
					
					   if($chunks[0]{0} === 'd'){
							$path = $d.$chunks[8].'/';
							check_file($id,$path);
							
					   }else{
							
							$files[]=$d.$chunks[8];

						}
				
				}
				
            }
			if(isset($files)){
				//var_dump($files);
				
			}
		//return $files;
	}
}

$f = check_file($conn_id ,'/');
//var_dump($f);

function local_file($dir){
	if(is_dir($dir)){
		$file = @opendir($dir);
		while($pathinfo = readdir($file)){
				if($pathinfo !='.' && $pathinfo != '..'){
					if(is_dir($dir.'/'.$pathinfo)){
						local_file($dir.'/'.$pathinfo);
					}else{
						$files = $dir.'/'.$pathinfo.";";
						$w = @fopen('../caches/statics.txt','a+');
	fwrite($w,$files);
	fclose($w);
					}
				}
		}
		@closedir();
	}
}
//local_file('../statics/public');

	$a = file_get_contents(PHPCMS_PATH. 'caches' .DIRECTORY_SEPARATOR. 'default_caches' .DIRECTORY_SEPARATOR. 'web_statics_list.txt');
	$b = explode(';',$a);
	foreach($b as $v){
		if(isset($v)){
				$url = str_replace(PHPCMS_PATH, '', $v);
				$url = str_replace('\\', '/', $url);
				$info = pathinfo($url);
				if($info['extension'] != 'jpg'){
					$c = file_get_contents($v);	
					echo $urls ='http://www.test-prykweb0451.com/'.$url;
					$con = @file_get_contents($urls);
					if($con){

						if (md5($con) != md5($c)) {
							echo 'diff';
						if(ftp_put($conn_id , $url, $v, FTP_ASCII)){
							echo 'ok';
						}else{
							echo 'fail';
						}
						} else {
							echo 'same';
						}
					} else {
						//@ftp_put($conn_id,$remote,$local, FTP_ASCII);
						
						if(ftp_put($conn_id , $remote, $local, FTP_ASCII)){
							echo 'ok';
						}else{
							echo 'fail';
						}
					}
				}else{
					$urls = 'http://www.test-prykweb0451.com'.$url;
					$con = @file_get_contents($urls);
					$c = file_get_contents($v);	
					if($con){
						if (md5($con) != md5($c)) {
						
								if(ftp_put($conn_id , $url, $v,  FTP_BINARY)){
									echo 'ok';
								}else{
									echo 'fail';
								}
								
						}else{
							return false;
						}
					}
					
				}
			
		}
	}

/*
	function del_text(){
		$file_caches = 'J:\AppServ\www\hospital\caches/statics.txt';
		if(file_exists($file_caches)){
			unlink($file_caches);
		}
		return true;
	}
	
	function update_text($static_dir=''){
		$static_dir = !empty($static_dir) ? $static_dir : 'J:\AppServ\www\hospital\statics';
	
		if (is_dir($static_dir)) {
			$path = @opendir($static_dir);
				while ($pathinfo = readdir($path)) {
					if ($pathinfo !='.' && $pathinfo != '..') {
						if (is_dir($static_dir.'/'.$pathinfo)) {
							update_text($static_dir.'/'.$pathinfo);
						}else{
							$files = $static_dir.'/'.$pathinfo.";";
							$file_caches = 'J:\AppServ\www\hospital\caches/statics.txt';
							if (file_exists($file_caches)) {
								$w = @fopen($file_caches,'a+b');
								fwrite($w,$files);
								fclose($w);
							}else{
								$w = @fopen($file_caches,'w+b');
								fwrite($w,$files);
								fclose($w);
							}
		
						}	
					}
				}
		} else {
				return false;
		}
	}
	del_text();
	echo update_text();
	*/