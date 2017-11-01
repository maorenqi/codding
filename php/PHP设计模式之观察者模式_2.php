<?php
interface Subject{
	public function Attach($Observer);
	public function Detach($Observer);
	public function Notify();
	public function SubjectState($Subject);
}

class Boss Implements Subject{
	public $_action;
	private $_Observer;
	public function Attach($Observer){
		$this->_Observer[] = $Observer;
	}
	
	public function Detach($Observer){
		$ObserverKey = array_search($Observer,$this->_Observer);
		
		if($ObserverKey !== false){
			unset($this->_Observer[$ObserverKey]);
		}
	}
	
	public function Notify(){
		foreach ($this->_Observer as $value){
			$value->Update();
		}
	}
	
	public function SubjectState($Subject){
		$this->_action = $Subject;
	}
}

abstract class Observer{
	protected $_UserName;
	protected $_Sub;
	public function __construct($Name,$Sub){
		$this->_UserName = $Name;
		$this->_Sub = $Sub;
	}
	public abstract function Update();
}

class StockObserver extends Observer{
	public function __construct($name,$sub){
		parent::__construct($name,$sub);
	}
	
	public function Update(){
		echo $this->_Sub->_action.$this->_UserName."你赶快跑……";	
	}
}

$huhansan = new Boss();
$gongshil = new StockObserver("三毛",$huhansan);

$huhansan->Attach($gongshil);
$huhansan->Attach($gongshil);
$huhansan->Detach($gongshil);

$huhansan -> SubjectState("警察来了");

$huhansan -> Notify();








