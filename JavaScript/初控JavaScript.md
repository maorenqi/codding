# JavaScript

## 定义和使用函数
	function myFunc(name,weather){
		document.writeln("This is a statement");
		document.writeln("Hello" + name);
		document.writeln("It is " + weather + "today");
	}
	myFunc("garfield","sunny")

### 定义返回结果的函数
	function myFunc(name){
	 	return ("Hello" + name);	
	};
	document.writeln(myFunc("Adam"));