<?php
	$lamp="Linux Apache MySQL PHP";  //声明一个字符串$lamp，每个单词之间使用空格分割
	$lampbrother=explode(" ", $lamp);    //将字符串$lamp使用空格分割，并组成数组返回
	echo $lampbrother[2];              //输出数组中第三个元素，即$lamp中的第三个子串MySQL
	echo $lampbrother[3];              //输出数组中第三个元素，即$lamp中的第四个子串PHP

	$password = "redhat:*:500:508::/home/redhat:/bin/bash";     //将Linux中的用户文件的一行提出
	list($user, $pass, $uid, $gid, , $home, $shell) = explode(":", $password);   //按“：”分割7个子串
	echo $user;           //第一个子串， 提出用户名保存在变量$user中，输出redhat
	echo $pass;          //第二个子串， 提出密码位字符保存在变量$pass中，输出*
	echo $uid;           //第三个子串， 提出用户名ID保存在变量$uid中，输出500
	echo $gid;           //第四个子串， 提出用户名组ID保存在变量$gid中，输出508
	echo $home;         //第六个子串， 提出家目录保存在变量$home中，输出/home/redhat
	echo $shell;          //第七个子串， 提出用户使用的shell保存在变量$shell中，输出/bin/bash
	
	$lamp="Linux+Apache+MySQL+PHP";  //声明字符串$lamp，每个单词之间使用加号“+”分割
	//使用正数限制子串个数，而最后那个元素将包含 $lamp中 的剩余部分
	print_r(explode('+', $lamp, 2));  //输出Array ( [0] => Linux [1] => Apache+MySQL+PHP )
	//使用负数限制子串，则返回除了最后的限制个元素外的所有元素
	print_r(explode('+', $lamp, -1));  //输出Array ( [0] => Linux [1] => Apache [2] => MySQL )
?>
