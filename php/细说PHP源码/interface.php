<?php
	interface One {                              //����һ���ӿ�ʹ��interface�ؼ��֣�OneΪ�ӿ�����
		const CONSTANT = 'CONSTANT value';    //�ڽӿ�������һ��������Ա���ԣ�������������һ��
		function fun1();                         //�ڽӿ�������һ�����󷽷���fun1()��
		function fun2();                         //�ڽӿ���������һ�����󷽷���fun2()��
	}

	abstract class Three implements One {          //����һ��������ȥʵ�ֽӿ�One�еĵڶ�������
		function fun2() {                       //ֻʵ�ֽӿ��е�һ�����󷽷�
			//�����ʵ�������������Ծ���
		}
	}

	class Four implements One {                 //����һ����ʵ�ֽӿ�One�е�ȫ�����󷽷�
		function fun1() {                      //ʵ�ֽӿ��е�һ������
			//�����ʵ�������������Ծ���
		}	

		function fun2() {                     //ʵ�ֽӿ��еĵڶ�������
			//�����ʵ�������������Ծ���
		}
	}
?>
