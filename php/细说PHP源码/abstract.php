<?php
	abstract class Person {             //����һ�������࣬Ҫʹ��abstract�ؼ��ֱ�ʶ
		protected $name;             //����һ���洢�˵����ӵĳ�Ա
		protected $country;           //����һ���洢�˵Ĺ��ҵĳ�Ա
			
	    	function __construct($name="", $country="china") {  //���췽�������������󲢳�ʹ����Ա����
			$this->name = $name;                      //Ϊ��Ա����name�ڴ�������ʱ����ֵ
			$this->country = $country;                  //Ϊ��Ա����country�ڴ�������ʱ����ֵ
		}
 
		abstract function say();   //�ڳ�����������һ��û�з�����ĳ��󷽷���ʹ��abstract�ؼ��ֱ�ʶ
	
		abstract function eat();   //�ڳ�������������һ��û�з�����ĳ��󷽷���ʹ��abstract�ؼ��ֱ�ʶ
		
		function run(){         //�ڳ������п������������ķǳ���ķ���
			echo "ʹ����������·<br>";                //�з����壬���һ�����
		}
	}
?> 

