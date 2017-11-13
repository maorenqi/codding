<?php
	class Person {           //����һ�����࣬�����������е�һЩ�䱾�����Ժ͹��ܳ�Ա����Ϊ���� 
		var $name;         //����һ���洢�˵����ӵĳ�Ա
		var $sex;           //����һ���洢�˵��Ա�ĳ�Ա
		var $age;           //����һ���洢�˵�����ĳ�Ա
		
	    	function __construct($name="", $sex="��", $age=1) {    //���췽�������������󲢳�ʹ����Ա����
			$this->name = $name;           //Ϊ��Ա����name�ڴ�������ʱ����ֵ
			$this->sex = $sex;              //Ϊ��Ա����sex�ڴ�������ʱ����ֵ
			$this->age = $age;              //Ϊ��Ա����age�ڴ�������ʱ����ֵ
		}

		function say(){           //������������һ��ͨ�õ�˵������������һ���Լ�
			echo "�ҵ����ӽУ�".$this->name."�� �Ա�".$this->sex."�� �ҵ������ǣ�".$this->age."��<br>";
		}	
		
		function run() {          //������������һ���˵�ͨ�õ���·����
			echo $this->name."������·��<br>";
		}
	}

	class Student extends Person {   //����һ��ѧ���࣬ʹ��extends�ؼ�����չ���̳У�Person��
		var $school;             //��ѧ����������һ������ѧУschool�ĳ�Ա����
		
		function study() {        //��ѧ����������һ��ѧ������ѧϰ�ķ���
			echo $this->name."����".$this->school."ѧϰ<br>";
		}	
	}

	class Teacher extends Student {  //������һ����ʦ�࣬ʹ��extends�ؼ�����չ���̳У�Student��
		var $wage;              //�ڽ�ʦ��������һ����ʦ����wage�ĳ�Ա����
		
		function teaching() {      //�ڽ�ʦ��������һ����ʦ���Խ�ѧ�ķ���
			echo $this->name."����".$this->school."��ѧ,ÿ�¹���Ϊ".$this->wage."��<br>";	
		}
	}
	
	$teacher1=new Teacher("����", "��", 40);   //ʹ�ü̳й����Ĺ��췽������һ����ʦ����
	
	$teacher1->school="edu";        //��һ����ʦ�����е�����ѧУ�ĳ�Ա����school��ֵ
	$teacher1->wage=3000;         //��һ����ʦ�����еĳ�Ա���Թ��ʸ�ֵ

	$teacher1->say();              //���ý�ʦ�����е�˵������
	$teacher1->study();            //���ý�ʦ�����е�ѧϰ����
	$teacher1->teaching();          //���ý�ʦ�����еĽ�ѧ����
?>

