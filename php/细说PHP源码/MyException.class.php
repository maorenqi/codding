<?php
	/* �Զ����һ���쳣�����࣬����������չ���쳣����������� */
	class MyException extends Exception{
		//�ض��幹����ʹ��һ������ message ��Ϊ���뱻ָ��������
		public function __construct($message, $code=0){
			//���������ﶨ��һЩ�Լ��Ĵ���
			//����ͬʱ���� parent::construct()��������еı����Ƿ��ѱ���ֵ
			parent::__construct($message, $code);
		}
		
		public function __toString() {        //��д���෽�����Զ����ַ����������ʽ
			return __CLASS__.":[".$this->code."]:".$this->message."<br>";
		}
		
		public function customFunction() {    //Ϊ����쳣�Զ���һ��������
			echo "���Զ���ķ���������ֵ�������͵��쳣<br>";
		}
	}
	
	try {                                //ʹ���Զ�����쳣�ಶ��һ���쳣���������쳣
		$error = '�����׳��������';       
		throw new MyException($error);    //����һ���Զ�����쳣�����ͨ��throw����׳�
		echo 'Never executed';             //�����￪ʼ��try������ڵĴ��뽫�����ٱ�ִ��
	} catch (MyException $e) {             //�����Զ�����쳣����
		echo '�����쳣: '.$e;              //���������쳣��Ϣ
		$e->customFunction();            //ͨ���Զ�����쳣�����еķ��������쳣
	}
	echo '���ѽ';                        //����û�б�����������ִ��
?>
