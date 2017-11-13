<?php	
	/**
		Project: 面向对象版图形计算器 
		file: result.class.php
		声明一个Result结果类，通过多态的应用获取用户所选择形状的计算结果
		package:shape
	*/
	class Result {
		private $shape = null ;             //成员属性用于获取某一形状对象

		/* 构造方法用于初使化成员属性$shape */
		function __construct(){
			/* 根据用户的get方法提交的动作'action'创建对应的形状对象[$_GET['action']()变量函数技术] */ 
			$this->shape = new $_GET['action']();
		}

		/*
		 * 声明一个魔术方法__toString，在直接访问该对象引用时自动调用，返回利用多态计算后的结果字符串 */
		function __toString(){
			
			//调用形状对象中的周长方法，获得周长的值
			$result = $this->shape->shapeName.'的周长：'.round($this->shape->perimeter(), 2).'<br>';
			//调用形状对象中的面积方法，获得面积的值
			$result .= $this->shape->shapeName.'的面积：'.round($this->shape->area(), 2).'<br>';
		
			return $result;
		
		}
	
	}

