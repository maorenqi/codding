<?php
	class Person  {           	 //����һ������Person�����а�����������Ա���Ա���װ����
		//�����������˵ĳ�Ա���ԣ�ȫ��ʹ����private�ؼ��ַ�װ
		private $name;      	 //��һ����Ա����$name�����˵����ӣ������Ա���װ
		private $sex;        	 //�ڶ�����Ա����$sex�����˵��Ա𣬴����Ա���װ
		private $age;         	//��������Ա����$age�����˵����䣬�����Ա���װ

		//����һ�����췽����������������ʱ��Ϊ����ĳ�Ա���Ը����ֵ
	    	function __construct($name="", $sex="��", $age=1) {
			$this->name = $name;  	  	//ʹ�ô���Ĳ���$nameΪ��Ա����$this->name����ֵ
			$this->sex = $sex;      	 //ʹ�ô���Ĳ���$sexΪ��Ա����$this->sex����ֵ
			$this->age = $age;      	 //ʹ�ô���Ĳ���$ageΪ��Ա����$this->age����ֵ
		}
	     	//���ڶ�������ʹ��isset()�ⶨ˽�ó�Ա����ʱ���Զ����ã������ڲ��ⶨ�۴����ⲿ��isset()���
		private function __isset($propertyName) {   //��Ҫһ���������ǲⶨ��˽�����Ե�����
			if($propertyName=="name")         	//��������д�������������ڡ�name��ʱ��������
				return false;                  //���ؼ٣��������ڶ����ⲿ�ⶨ�������
			return isset($this->$propertyName);   //���������Զ����Ա��ⶨ�������زⶨ�Ľ��
   		}
         	//���ڶ�������ʹ��unset()����ɾ��˽������ʱ���Զ������ã������ڲ���˽�õĳ�Ա����ɾ��
   		private function __unset($propertyName) {   //��Ҫһ����������Ҫɾ����˽����������
			if($propertyName=="name")          //��������д�������������ڡ�name��ʱ��������
				return;                       //�˳�������������ɾ�������е�name����
			unset($this->$propertyName);         //�ڶ�����ڲ�ɾ���ڶ�����ָ����˽������
		}

		public function say()  //����������˵���ķ����������е�˽������˵��
		{
			echo "�ҵ����ӽУ�".$this->name."�� �Ա�".$this->sex."�� �ҵ������ǣ�".$this->age."��<br>";
		}		
	}

	$person1=new Person("����", "��", 40);   //����һ������$person1������Ա���Էֱ��ϳ�ֵ
	
	var_dump(isset($person1->name));        //���bool(false)��������ⶨ�����Ƿ����name����
	var_dump(isset($person1->sex));          //���bool(true)��ʹ��isset()�ⶨ�����д���sex˽������
	var_dump(isset($person1->age));          //���bool(true)��ʹ��isset()�ⶨ�����д���age˽������
	var_dump(isset($person1->id));           //���bool(false)��ʹ��isset()�ⶨ�����в�����id����
	
	unset($person1->name);                //ɾ�������е�˽������name������__unset()�в�����ɾ��
	unset($person1->sex);                  //ɾ�������е�˽������sex��ɾ���ɹ�
	unset($person1->age);                  //ɾ�������е�˽������age��ɾ���ɹ�
	
	$person1->say();  //�����е�sex��age���Ա�ɾ����������ҵ����ӽУ������� �Ա𣺣� �ҵ������ǣ���
?>

