<?php
	class Person {        //����һ��Person�࣬����������Ա���Ժ�һ����Ա����
		private $name;   //�˵�����
		private $sex;     //�˵��Ա�
		private $age;     //�˵�����
	
		function __construct($name="", $sex="", $age="") {   //���췽��Ϊ��Ա���Ը���ֵ
			$this->name=$name;
			$this->sex=$sex;
			$this->age=$age;
		}

		function say()  {              //����˿���˵���ķ���, ˵���Լ��ĳ�Ա����
			echo "�ҵ����ӽУ�".$this->name." �Ա�".$this->sex." �ҵ������ǣ�".$this->age."<br>";
		}

		function __sleep() {            //��������Ӵ˷������ڴ��л�ʱ�Զ����ò���������
			$arr=array("name", "age");  //�����еĳ�Ա$name��$age�������л�����Ա$sex�򱻺���
			return($arr);              //����һ������
		} 
		
		function __wakeup() {          //�ڷ����л�����ʱ�Զ����ø÷�����û�в���Ҳû�з���ֵ
			 $this->age = 40;         //��������֯����ʱ��Ϊ�¶����е�$age�������¸�ֵ
		}
	}

	$person1=new Person("����", "��", 20);        //ͨ��Person��ʵ�������󣬶���������Ϊ$person1
	//��һ�������л�����һ���ַ�����������__sleep()����,����û�������е�����$sex
	$person_string=serialize($person1); 
	echo $person_string."<br>";                  //��������л����ַ���
 
   	 //�����л����󣬲��Զ�������__wakup()��������Ϊ�¶����е�$age���Ը�ֵ
	$person2=unserialize($person_string);          //�����л������γɶ���$p2���¸�ֵ$ageΪ40
	$person2->say();                           //�����¶�����say()��������ĳ�Ա����û��$sex������
?>

