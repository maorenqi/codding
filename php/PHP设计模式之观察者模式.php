	<?php
//Observer
interface IObserver{
	public function notify();
}

// 定义可以被观察的对象接口
interface IObservable{
	public function addObserver($observer);
}

//实现IObservable接口
class MessageSystem Implements IObservable{
	private $_observers = array();
	
	public function addObserver($observer){
		$this->_observers = $observer;
	}
	
	public function doNotify(){
		foreach($this->_observers as $o){
			$o->notify();
		}	
	}
}

class User Implements IObserver{
	public function __construct($username){
		echo "我是新用户{$username}<br />";
	}
	
	//通知观察者方法
	public function notify(){
		echo  '欢迎新用户';
	}
}

//使用
$u = new MessageSystem();
$u->addObserver(new User('小红'));
//$u->addObserver(new User('小明'));
$u->addObserver(new User('小黑'));
$u->doNotify();