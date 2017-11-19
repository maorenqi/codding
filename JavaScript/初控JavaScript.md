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
### 将函数用做方法
	var myData = {
		name:"Garfield",
		weather:"sunny"，
		printMessages:function(){
			document.writeln("Hello" + name);
			document.writeln("It is " + weather + "today");
		}
	};

	myData.printMessages();

### 使用对象（读取和修改属性）
	var myData = {
		name:"Garfield",
		weather:"sunny"
	};
	myData.name = "Joe";
	myData["weather"] = "raining";
### 枚举对象属性
	var myData = {
		name:"Garfield",
		weather:"sunny"，
		printMessages:function(){
			document.writeln("Hello" + name);
			document.writeln("It is " + weather + "today");
		}
	};
	for(var prop in myData){
		document.writeln("Name:" + prop + " Value: " + myData[prop]);
	};

	printout:
	Name: name Value: Garfield
	Name: weather Value: sunny
	Name: printMessages Value: function(){
			document.writeln("Hello" + name);
			document.writeln("It is " + weather + "today");
		}
### 为对象添加新属性
	var myData = {
		name:"Garfield",
		weather:"sunny"
	};
	myData.dayOfWeek = "Monday";

### 为对象添加新方法
	var myData = {
		name:"Garfield",
		weather:"sunny"
	};
	myData.sayHello = function(){
		document.writeln("Hello");	
	}
### 删除对象属性
	var myData = {
		name:"Garfield",
		weather:"sunny"
	};
	delete myData.name;
	delete myData["weather"];
### 判断对象是否具有某个属性
	var myData = {
		name:"Garfield",
		weather:"sunny"
	};
	var hasName = "name" in myData;
	var hasDate = "date" in myDate;
## JavaScript运算符（相等和等同运算符）
	//使用相等运算符
	<script type="text/javascript">
		var firstVal = 5;
		var secondVal = "5";
		if(firstVal == secondVal){
			document.writeln("They are the same");
		}else{
		
			document.writeln("They are NOT the same");
		}
	</script>
	输出：They are the same

	//使用等同运算符
	<script type="text/javascript">
		var firstVal = 5;
		var secondVal = "5";
		if(firstVal === secondVal){
			document.writeln("They are the same");
		}else{
		
			document.writeln("They are NOT the same");
		}
	</script>
	输出：They are NOT the same
### JavaScript基本类型的比较是值的比较，而JavaScript对象的比较则是引用的比较。