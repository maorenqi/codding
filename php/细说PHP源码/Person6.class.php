<?
	class Person  {            //����һ������Person�����а�����������Ա���Ա���װ����
		//�����������˵ĳ�Ա���ԣ�ȫ��ʹ����private�ؼ��ַ�װ
		private $name;       //��һ����Ա����$name�����˵����ӣ������Ա���װ
		private $sex;         //�ڶ�����Ա����$sex�����˵��Ա𣬴����Ա���װ
		private $age;         //��������Ա����$age�����˵����䣬�����Ա���װ

		//����һ�����췽����������������ʱ��Ϊ����ĳ�Ա���Ը����ֵ
	     	function __construct($name="", $sex="��", $age=1) {
			$this->name = $name;    //ʹ�ô���Ĳ���$nameΪ��Ա����$this->name����ֵ
			$this->sex = $sex;       //ʹ�ô���Ĳ���$sexΪ��Ա����$this->sex����ֵ
			$this->age = $age;       //ʹ�ô���Ĳ���$ageΪ��Ա����$this->age����ֵ
		}

		function run(){              //����������һ����·���������������ڲ���˽�з������
			echo $this->name."����·ʱ".$this->leftLeg()."��".$this->rightLeg()."<br>";	
		}
         
		private function leftLeg() {    //����һ�������ȵķ���������װ����ֻ�����ڲ�ʹ��
			return "������";
		}
         
		private function rightLeg() {   //����һ�������ȵķ���������װ����ֻ�����ڲ�ʹ��
			return "������";
		}
	}
	$person1=new Person();         //��������$person1 
	$person1->run();               //run()�ķ���û�б���װ�����Կ����ڶ����ⲿʹ��
	$person1->name="����";        //name���Ա���װ�������ڶ����ⲿ��˽�����Ը�ֵ
	echo $person1->age;            //age���Ա���װ�������ڶ�����ⲿ��ȡ˽�����Ե�ֵ
	$person1->leftLeg();            //leftLeg()��������װ�������ڶ���������ö�����˽�еķ���
?>

