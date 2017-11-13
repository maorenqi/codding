<?php
	class Phone {                      //声明电话类
        	//声明4个与电话有关的成员属性
		var $Manufacturers;        //第一个成员属性，用于存储电话的厂商
		var $color;                //第二个成员属性，用来设置电话的外关颜色
		var $Battery_capacity;     //第三个成员属性，用来定义电话的电池容量
		var $screen_size;          //第四个成员属性，用来定义电话的屏幕尺寸

		function call(){          //第一个成员方法用来声明电话具有接打电话的功能
		    	//方法体，可以是打电话的具体内容
               		echo "正在打电话";
		}

		function message(){       //第二个成员方法用来声明电话具有发信息的功能
		        //方法体，可以是发送的具体信息
               		echo "正在发信息";
		}

		function playMusic() {    //第三个成员方法用来声明电话具有播放音乐的功能
		    	//方法体，可以是播放的具体音乐
             		echo "正在播放音乐";
		}

		function photo() {         //第四个成员方法用来声明电话具有拍照的功能
		     	//方法体，可以是拍照的整个过程
               		echo "正在拍照";
		}
	}
?>

