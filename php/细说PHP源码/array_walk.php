<?php
	function myFun1($value,$key) {                   	//定义一个回调函数接收两个参数
		echo "The key $key has the value $value<br>";   //将参数连接在一超输出
	}

	$lamp=array("a"=>"Linux","b"=>"Apache","c"=>"Mysql","d"=>"PHP");  //定义一个数组$lamp
	array_walk($lamp,"myFun1");       				  //使用array_walk函数传入一个数组和一个回调函数
	/*  执行后输出如下结果：
	    The key a has the value Linux
	    The key b has the value Apache
	    The key c has the value MySQL
	    The key d has the value PHP */

	function myFun2($value,$key,$p)  {        	  //自定义一个回调函数需要接受三个参数
		echo "$key $p $value <br>";               //将三个参数连接后输出
	}
	
	array_walk($lamp,"myFun2","has the value");   	  //使用array_walk函数传入三个参数
	/*执行后输出如下结果：	
	  a has the value Linux 
	  b has the value Apache 
	  c has the value MySQL
       d has the value PHP     */

	function myFun3(&$value,$key) {      		//改变数组元素的值（请注意 &$value传入引用）
		$value="Web";                 		//将改变原数组中每个元素的值
	}

	array_walk($lamp,"myFun3");   //使用array_walk函数传入两个参数，其中第一个参数为引用
	print_r($lamp);               //输出：Array ( [a] => Web [b] => Web [c] => Web [d] => Web ) 
?>
