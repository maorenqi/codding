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

## 使用变量和类型
	

##	创建对象
	var myData = new Object();
	myData.name = "Adma";
	myData.weather = "sunny";
### 使用对象字面量（一口气定义一个对象及其属性）
	var myData = {
		name:"Garfield",
		weather:"sunny"
	};