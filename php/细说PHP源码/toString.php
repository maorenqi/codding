<?php
	class TestClass {                 //����һ�������࣬����������һ����Ա���Ժ�һ��__toString()����
   		private $foo;                //������������һ����Ա����

    		function __construct($foo) {  //ͨ�����췽����ֵΪ��Ա���Ը���ֵ
        		$this->foo = $foo;      //Ϊ��Ա���Ը�ֵ
   		}
  
		public function __toString() {  //�����ж���һ��__toString���� 
        		return $this->foo;       //����һ����Ա����$foo��ֵ
		}
	}

	$obj = new TestClass('Hello');     //����һ�����󲢸�ֵ����������$obj
	echo $obj;                     //ֱ����������������Զ������˶����е�__toString()�������Hello
?>

