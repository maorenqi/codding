<?php
class Fibonacci implements Iterator{
	private $previous = 1;
	private $current=0;
	private $key=0;
	
	
	public function rewind(){
		$this->previous=1;
		$this->current=0;
		$this->key=0;
	}
	
	public function current(){
		return $this->current;
	}
	
	public function valid(){
		return true;
	}
	public function key(){
		return $this->key;
	}
	
	public function next(){
		$newprevious = $this->current;
		$this->current+=$this->previous;
		$this->previous=$newprevious;
		$this->key++;
	}
}

$seq =new Fibonacci;
$i=0;
foreach($seq as $f){
	echo "$f ";
	if($i++ ===15)	break;
}
