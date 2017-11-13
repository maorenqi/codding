<html>
	<head>
		<title>PHP实现简单计算器(使用分支结构)</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>
<?php
	$error="";    //声明一个错误消息变量，如果在表单中输入有误将错误消息放入该变量
	
	$num1 = isset($_POST["num1"]) ? $_POST["num1"] : "";                //初使化第一个数
	$num2 = isset($_POST["num2"]) ? $_POST["num2"] : "";                //初使化第二个数
	$operator = isset($_POST["operator"]) ? $_POST["operator"] : "";    //初使化运算符号

	//单路分支， 使用isset($_POST["sub"])判断用户是否有提交操作
	if(isset($_POST["sub"])) {   
		if($num1== "") {         //验证第一个数是否不空
			$error .= "第一个数不能为空<br>";

		}
		if(!is_numeric($num1)) { //验证第一个数是否为数字
			$error .= "第一个数不是数字<br>";
		}

		if($num2 == "") {        //验证第二个数是否不空
			$error .= "第二个数不能为空<br>";

		}
		if(!is_numeric($num2)) { //验证第二个数是否为数字
			$error .= "第二个数不是数字<br>";
		}
		

		if(empty($error)) {             //如果错误消息为空，说明输入正确的数据可以运算
			$sum = 0;          	//声明一个变量用来接收运算的结果
		
			switch($operator) {	//多路分支switch,判断用户使用的运算符号
				case "+":
					$sum = $num1 + $num2;   //加法运算
					break;
				case "-":
					$sum = $num1 - $num2;    //减法运算
					break;
				case "x":
					$sum = $num1 * $num2;    //乘法运算
					break;
				case "/":
					$sum = $num1 / $num2;    //除法运算
					break;
				case "%":
					$sum = $num1 % $num2;    //求模运算
					break;
			}
		}
	}
?>

	<body>
		<table align="center" border="1" width="500">
			<caption><h1>计算器</h1></caption>
			<form action="" method="post">
			<tr>
				<td> 
					<?php  /*将用户输入的数据计算后还显示在输入表单中*/ ?>
					<input type="text" size="5" name="num1" value="<?php echo $num1 ?>" >
				</td>
				<td>
					<select name="operator">
						<?php /* 如果用户选择运算符后将其保留在界面上 */ ?>
						<option value="+" <?php if($operator == "+") echo "selected" ?>>+</option>
						<option value="-" <?php if($operator == "-") echo "selected" ?>>-</option>
						<option value="x" <?php if($operator == "x") echo "selected" ?>>x</option>
						<option value="/" <?php if($operator == "/") echo "selected" ?>>/</option>
						<option value="%" <?php if($operator == "%") echo "selected" ?>>%</option>
					</select>
				</td>
				<td>
					<input type="text" size="5" name="num2" value="<?php echo $num2 ?>">
				</td>
				<td>
					<input type="submit" name="sub" value="计算">
				</td>
			</tr>

			<?php
				//使用单路分支， 用户有提交操作才去执行结果
				if(isset($_POST["sub"])){
					echo '<tr><td colspan="5" align="center">';
					//双路分支，正解输入输出结果，有错误则输出错误消息
					if(empty($error)){
						echo "结果：{$num1} {$operator} {$num2} = {$sum}";
					}else{
						echo $error;
					}	
					echo '</td></tr>';
				}
			?>
			</form>
		</table>
	</body>
</html>
