<?php
/* $str = "lamp";
$number = 789;
$format = "The %2\$s book contains %1\$d pages.That is a nice %2\$s full of %1\$d pages.<br>";
 
printf($format,$number,$str);*/
header("Content-type:text/html;charset=utf-8");

$files = array("file11.txt","file22.txt","file1.txt","file2.txt");

function mySort($arr,$select = false){
	for($i=0; $i<count($arr); $i++){
		for($j=0; $j<count($arr)-1; $j++){
			if($select){
				if(strcmp($arr[$j],$arr[$j+1])>0){
					$tmp = $arr[$j];
					$arr[$j] = $arr[$j+1];
					$arr[$j+1] = $tmp;
				}
			}else{
				if(strnatcmp($arr[$j],$arr[$j+1])>0){
					$tmp = $arr[$j];
					$arr[$j] = $arr[$j+1];
					$arr[$j+1] = $tmp;
				}
			}		
		}	
	}
	return $arr;
}
echo "字节顺序进行字符串比较：";
print_r(mySort($files,true));
echo '<br>自然排序进行字符串比较：';
print_r(mySort($files,false));
