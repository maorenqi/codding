<?
	class Person {           //����һ�����࣬�����������е�һЩ�䱾�����Ժ͹��ܳ�Ա����Ϊ���� 
		protected $name;         //����һ���洢�˵����ӵĳ�Ա
		protected $sex;           //����һ���洢�˵��Ա�ĳ�Ա
		protected $age;           //����һ���洢�˵�����ĳ�Ա
		
	    	function __construct($name="", $sex="��", $age=1) {  //���췽�������������󲢳�ʹ����Ա����
			$this->name = $name;           //Ϊ��Ա����name�ڴ�������ʱ����ֵ
			$this->sex = $sex;              //Ϊ��Ա����sex�ڴ�������ʱ����ֵ
			$this->age = $age;              //Ϊ��Ա����age�ڴ�������ʱ����ֵ
		}

		function say(){           //������������һ��ͨ�õ�˵������������һ���Լ�
			echo "�ҵ����ӽУ�".$this->name."�� �Ա�".$this->sex."�� �ҵ������ǣ�".$this->age."��<br>";
		}	
	}

	class Student extends Person {   //����һ��ѧ���࣬ʹ��extends�ؼ�����չ���̳У�Person��
		private $school;             //��ѧ����������һ������ѧУschool�ĳ�Ա����
	
         	//���Ǹ����еĹ��췽�����ڲ����б��ж����һ��ѧУ���ԣ������������󲢳�ʹ����Ա����
	    	function __construct($name="", $sex="��", $age=1, $school="") {   
			$this->name = $name;           //Ϊ��Ա����name�ڴ�������ʱ����ֵ
			$this->sex = $sex;              //Ϊ��Ա����sex�ڴ�������ʱ����ֵ
			$this->age = $age;              //Ϊ��Ա����age�ڴ�������ʱ����ֵ
			$this->school=$school;          //�����һ��Ϊ����������չ�ĳ�Ա���Ը���ֵ
		}

		function study() {        //��ѧ����������һ��ѧ������ѧϰ�ķ���
			echo $this->name."����".$this->school."ѧϰ<br>";
		}
		//����һ���͸�����ͬ���ķ������������е�˵���������ǲ���д����˵�����ڵ�ѧУ����
		function say() { 
			echo "�ҵ����ӽУ�".$this->name."�� �Ա�".$this->sex."�� �ҵ������ǣ�".$this->age.",��".$this->school."ѧУ��ѧ<br>";
		}	
	}

	$student=new Student("����","��",20, "edu");    //����һ��ѧ�����󣬲��ഫһ��ѧУ���Ʋ���
	$student->say();                            //����ѧ�����и��Ǹ����˵������
?>

