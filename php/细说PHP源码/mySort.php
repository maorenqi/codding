<?php
	$files=array("file11.txt", "file22.txt","file1.txt", "file2.txt");   //定义一个包含数字值的数组
	//自定义的函数，第一参数为被排序数组，第二个参数选择使用哪个函数进行比较
	function mySort($arr, $select=false) {  
		for($i=0; $i<count($arr); $i++) {
			for($j=0; $j<count($arr)-1; $j++) {
				if($select) {         //如果第二个参数为true则使用strcmp()函数比较大小
					if(strcmp($arr[$j],$arr[$j+1]) > 0) { //前后两个值比较结果大于0则交换位置
						$tmp=$arr[$j];
						$arr[$j]=$arr[$j+1];
						$arr[$j+1]=$tmp;
					}
				}else{             //如果第二个参数为false则使用strnatcmp()函数比较大小
					if(strnatcmp($arr[$j],$arr[$j+1]) > 0) {  //如果比较结果大于0交换位置
						$tmp=$arr[$j];
						$arr[$j]=$arr[$j+1];
						$arr[$j+1]=$tmp;
					}
				}
			}
		}
		return $arr;         //返回排序后的数组
	}
	print_r(mySort($files, true));    //选择按字典顺序排序： file1.txt  file11.txt  file2.txt  file22.txt 
	print_r(mySort($files, false));    //选择按自然顺序排序： file1.txt  file2.txt  file11.txt  file22.tx
?>

