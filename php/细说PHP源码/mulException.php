<?php
	/* �Զ����һ���쳣�����࣬����������չ���쳣����������� */
	class MyException extends Exception{
		//�ض��幹����ʹ��һ������ message ��Ϊ���뱻ָ��������
		public function __construct($message, $code=0){
			//���������ﶨ��һЩ�Լ��Ĵ���
			//����ͬʱ���� parent::construct()��������еı����Ƿ��ѱ���ֵ
			parent::__construct($message, $code);
		}
		//��д�����м̳й����ķ������Զ����ַ����������ʽ
		public function __toString() {
			return __CLASS__.":[".$this->code."]:".$this->message."<br>";
		}

		//Ϊ����쳣�Զ���һ��������
		public function customFunction() {
			echo "���Զ���ķ���������ֵ�������͵��쳣";
		}
	}
	
	/* ����һ�����ڲ����Զ�����չ���쳣��MyException */
	class TestException {
		public $var;                      //һ����Ա���ԣ������ж϶����Ƿ񴴽��ɹ�����ʹ��

		function __construct($value=0) {     //ͨ�����췽���Ĵ�ֵ�����׳����쳣
			switch($value){              //�Դ����ֵ����ѡ���Ե��ж�
				case 1:                 //�������Ĳ���ֵΪ1�����׳��Զ�����쳣����
					throw new MyException("�����ֵ��1�� ��һ����Ч�Ĳ���", 5);
					break;
				case 2:                //�������Ĳ���ֵΪ2�����׳�PHP���õ��쳣����
					throw new Exception("�����ֵ��2����������Ϊһ������", 6);
					break;
				default:                //�������Ĳ���ֵ�Ϸ������׳��쳣��������ɹ� 
					$this->var=$value;  //Ϊ�����еĳ�Ա���Ը�ֵ
					break;
			}
		}
	}
     	//ʾ��1����û���쳣ʱ����������ִ�У�try�еĴ���ȫ��ִ�в�����ִ���κ�catch����
	try{
		$testObj=new TestException();           //ʹ��Ĭ�ϲ��������쳣�Ĳ��������
		echo "***********<br>";               //û���׳��쳣�������ͻ�����ִ��
	}catch(MyException $e){                    //�����û��Զ�����쳣����
		echo "�����Զ�����쳣��$e <br>";     //���Զ���ķ�ʽ����쳣��Ϣ
		$e->customFunction();                 //���Ե����Զ�����쳣������
	}catch(Exception $e) {                      //����PHP���õ��쳣������Ķ���
		echo "����Ĭ�ϵ��쳣��".$e->getMessage()."<br>";   //����쳣��Ϣ
	} 	
	var_dump($testObj);          //�ж϶����Ƿ񴴽��ɹ������û���κ��쳣���򴴽��ɹ�

    	//ʾ��2���׳��Զ�����쳣����ͨ���Զ�����쳣�����ಶ������쳣������
	try{
		$testObj1=new TestException(1);         //�������1ʱ����������������׳��Զ����쳣
		echo "***********<br>";               //�����䲻�ᱻִ��
	}catch(MyException $e){                    //���catch�����еĴ��뽫��ִ��
		echo "�����Զ�����쳣��$e <br>";
		$e->customFunction();
	}catch(Exception $e) {                      //���catch���鲻��ִ��
		echo "����Ĭ�ϵ��쳣��".$e->getMessage()."<br>";
	} 	
	var_dump($testObj1);                      //���쳣�������������û�д����ɹ�

    	//ʾ��2���׳����õ��쳣����ͨ���Զ�����쳣�����ಶ������쳣������
	try{
		$testObj2=new TestException(2);        //�������2ʱ����������������׳������쳣
		echo "***********<br>";             //�����䲻�ᱻִ��
	}catch(MyException $e){                  //���catch���鲻��ִ��
		echo "�����Զ�����쳣��$e <br>";
		$e->customFunction();
	}catch(Exception $e) {                    //���catch�����еĴ��뽫��ִ��
		echo "����Ĭ�ϵ��쳣��".$e->getMessage()."<br>";
	} 	
	var_dump($testObj2);                    //���쳣�������������û�д����ɹ�
?>
