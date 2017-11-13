<?php
	$lamp=array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL", "d"=>"PHP");
	echo array_rand($lamp,1);           	     //随机从数组$lamp中取1个元素的键值，例如b
	echo $lamp[array_rand($lamp)]."<br>"; 	     //通过随机的一个元素的键值获取数组中一个元素的值
	$key=array_rand($lamp,2);           	     //随机从数组$lamp中取2个元素的键值赋给数组$key
	echo $lamp[$key[0]]."<br>";         	     //通过数组$key中第一个值获取数组$lamp中一个元素的值
	echo $lamp[$key[1]]."<br>";          	     //通过数组$key中第二个值获取数组$lamp中另个元素的值
?>

