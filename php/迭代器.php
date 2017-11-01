<?php
/* class myIterator implements Iterator {
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );  

    public function __construct() {
        $this->position = 0;
    }

    function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}

$it = new myIterator;
echo "<pre>";
print_r($it);
exit;
foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}

 */
 header("Content-type:text/html; charset=utf-8");
class MyIterator implements Iterator{
	
	private $var=array();
	public function __construct($array){
		if(is_array($array)){
			$this->var = $array;
		}
	}
	
	public function rewind(){
		echo "倒回第一个元素\n";
		reset($this->var);		
	}
	
	public function current(){
		$var=current($this->var);
		echo "当前元素：$var\n";
		return $var;
	}

	public function key() {
        $var = key($this->var);
         echo "当前元素的键: $var\n";
         return $var;
     }
	
	public function next(){
		$var = next($this->var);
		echo "移动下一个元素：$var\n";
		return $var;
	}
	
	public function valid(){
		$var = $this->current()!==false;
		echo "检查有效性：{$var}\n";
		return $var;
	}
}
	$values = array(10,20,30);
	$it =new MyIterator($values);
	
	foreach ($it as $k=>$v){
		print"此时键值对--key $k:value $v\n\n";
		
	}
	


?>

