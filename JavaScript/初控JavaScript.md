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
	push(<item>)
	reverse()
	shift()
	slice()
	sort()
	unshift(<item>)
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

### 推迟脚本的执行
可以用async和defer属性的执行方法。  
defer属性告诉浏览器要等页面载入和解析完毕之后才能执行脚本。

### 异步执行脚本
async属性解决的是不需要脚本同步顺序执行，以提高基性能。  
使用Async属性的一个重要后果是页面中的脚本可能不再按定义它们的次序执行。因此如果脚本使用了其他脚本中定义的函数或值，那就不宜使用async属性。

### 使用DOM和事件对象（Event）
 	
	var pElems = document.getElementsByTagName("p");
    for (var i = 0; i < pElems.length; i++) {
        pElems[i].onmouseover = handleMouseOver;
        pElems[i].onmouseout = handleMouseOut;
    }

    function handleMouseOver(e) {
        e.target.style.background='white'; 
        e.target.style.color='black';
    }
    
    function handleMouseOut(e) {
        e.target.style.removeProperty('color');
        e.target.style.removeProperty('background');
    }

> 注：这段脚本（必须把它移到页尾，因为操作的是DOM）找到我想要处理事件的所有元素，然后给事件处理器属性设置一个函数名。所有事件都拥有像这样的属性。它们的命名方式是一致的：以on开头，后接事件的名称。   
> 使用函数的名称来将它注册成一个事件监听器。一个常见的错误是把括号加在函数名的后面，使handleMouse变成handleMouse（）。这样做的后果是你的函数会在脚本执行时（而不是事件触发时）被调用。   
> 代码清单中那些处理事件的函数定义了一个名为e的参数。它会被设成浏览器所创建的一个Event对象。用于在事件触发时代表该事件。这个Event对象向你提供了所发生的事件信息，让你能够更加灵活地（相当于把代码放在元素属性中而言）对用户交互行为作出反应。target属性来获取触发事件的HTMLElement,这样就能使用样式 属性来改变它的外观。

	var pElems = document.getElementsByTagName("p");
    for (var i = 0; i < pElems.length; i++) {
        pElems[i].addEventListener("mouseover", handleMouseOver);
        pElems[i].addEventListener("mouseout", handleMouseOut);
    }
    
    document.getElementById("pressme").onclick = function() {
        document.getElementById("block2").removeEventListener("mouseout",
            handleMouseOut);
    }

    function handleMouseOver(e) {
        e.target.style.background='white'; 
        e.target.style.color='black';
    }
    
    function handleMouseOut(e) {
        e.target.style.removeProperty('color');
        e.target.style.removeProperty('background');
    }
> 使用addEventListener方法，它由HTMLElement对象实现。

#### Event对象的函数和属性
- type	事件的名称（如mouseover）	字符串
- target	事件指向的元素	HTMLElement
- currentTarget	带有当前被触发事件监听器的元素	HTMLElement
- eventPhase	事件生命周期阶段	数值
- bubbles	如果事件会在文档里冒泡则返回true，否则返回false 	布尔型
- cancelable	如果事件带有可撤消的默认行为则返回true，否则返回false 布尔型
- timeStamp		事件创建时间，如果时间不可用则为0 	字符串
- stopPropagation()	在当前元素的事件监听器被触发后终止事件在元素树中流动	void
- stopImmediatePropagation()	立即终止事件在元素树中的流动。当前元素上未被触发的事件监听器会被忽略 	void
- preventDefault()	防止浏览器执行与事件关联的默认操作	void
- defaultPrevented	如果调用preventDefault()则返回true	布尔型
