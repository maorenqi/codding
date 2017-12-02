# JavaScript

##语言核心
###词法结构

区分大小写






























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
> JavaScript基本类型的比较是值的比较，而JavaScript对象的比较则是引用的比较。


### 将数值转换为字符串
	var myData = (5).toString() + String(5);
> toString和string两种方法的作用一样。
> toString(2) 以二进制形式表示数值
### 将字符串转换为数值
	var firstVal = "5";	
	Number(firstVal);

	parseInt(<str>) //通过分析指定字符串，生成一个整数值
	parseFloat(<str>) //通过分析指定字符串，生成一个整数或实数值
### 使用数组
	var myArray = new Array();
	myArray[0] = 100;
	myArray[1] = "Adam";
	myArray[2] = true;

	//使用数组字面量
	var myArray = [100, "Adam", true]
### 读取和修改数组内容
	var myArray = [100, "Adam", true]
	myArray[0] = "Tuesday"

### 枚举数组内容
	var myArray = [100, "Adam", true]
	for (var i = 0; i<myArray.length; i++){
		document.writeln("Index " + i + ":" + myArray[i]);
	} 

### 内置的数组方法
	concat(<otherArray>)
	join()
	pop()
	push()
	reverse()
	shift()
	slice()
	sort()
	unshift()
### 处理错误
	try{
		var myArray;
		for (var i = 0; i<myArray.length; i++){
			document.writeln("Index " + i + ":" + myArray[i]);
		} 
	}catch (e){
		document.writeln("Error: " + e);
	}
>如果没有发生错误，那么这些语句会正常执行，catch子句会被忽略。
>如果有错误发生，那么try子句中语句的执行将立即停止，控制权转移到catch子句中。发生的错误由一个Error对象描述，它会被传递给catch子句。Error对象定义的属性。

	message 
	name
	number
### 使用finally子句
	try{
		var myArray;
		for (var i = 0; i<myArray.length; i++){
			document.writeln("Index " + i + ":" + myArray[i]);
		} 
	}catch (e){
		document.writeln("Error: " + e);
	} finally {
		document.writeln("Statements here are always executed");
	}
> catch子句提供了一个从错误中恢复或在错误发生后进行一些清理工作的机会。不管是否发生错误都执行一些语句，加上一条finally子句并将它们置于其中。
### 比较undefined 和 null值
读取未赋值的变量或试图读取对象没有的属性时得到的就是**undefined**值。**null**表示已经赋了一个值但该值无值。
### 检查变量或属性是否为undefined 或null
if (!myData.name){

}else{

}