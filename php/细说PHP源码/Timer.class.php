<?php
	class Timer {                         	   //����һ������ű�����ʱ�����
		private $startTime;                //����ű���ʼִ��ʱ��ʱ�䣨��΢�����ʽ���棩
		private $stopTime;                 //����ű�����ִ��ʱ��ʱ�䣨��΢�����ʽ���棩
		
		function __construct(){            //���췽�����ڴ�������ʱ��ʹ����Ա����
			$this->startTime=0;        //��ʹ����Ա����startTime��ֵΪ0
			$this->stopTime=0;         //��ʹ����Ա����stopTime��ֵΪ0
		}
			
		function start(){                       	//�ڽű���ʼ�����û�ȡ�ű���ʼʱ���΢��ֵ
			$this->startTime = microtime(true);     //����ȡ��ʱ�丳����Ա����$startTime
		}

		function stop(){                       		//�ڽű����������û�ȡ�ű�����ʱ���΢��ֵ
			$this->stopTime= microtime(true);   	//����ȡ��ʱ�丳����Ա����$stopTime
		}
		function spent(){                     		//����ͬһ�ű������λ�ȡʱ��Ĳ�ֵ
			return round(($this->stopTime- $this->startTime) , 4);  //�������4��5�뱣��4λ����
		}
	}
	
	$timer = new Timer();                //����Timer��Ķ���
	$timer->start();                     //�ڽű��ļ���ʼִ��ʱ�����������
	usleep(1000);                        //�ű����������ݣ�����������һ����Ϊ��
	$timer->stop();                      //�ڽű��ļ���β�������������
	echo "ִ�иýű���ʱ<b>".$timer->spent()."</b>��";     //���ҳ��ִ��ʱ���е�ʱ��
?>

