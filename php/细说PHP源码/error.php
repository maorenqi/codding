<html>
	<head><title>测试错误报告</title></head>
	<body>
		<h2>测试错误报告</h2>
		<?php
			/*开启php.ini中的display_errors指令，只有该指令开启如果有错误报告才能输出*/
			ini_set('display_errors',1);  
			/*通过error_reporting()函数设置在本脚本中，输出所有级别的错误报告*/
			error_reporting(E_ALL);
			/*“注意(notice)”的报告，不会阻止脚本的执行，并且可能不一定是一个问题 */
			getType($var);          //调用函数时提供的参数变量没有在之前声明
			/*“警告(warning)”的报告，指示一个问题，但是不会阻止脚本的执行 */
			getType();             //调用函数时没有提供必要的参数
			/*“错误(error)”的报告，它会终止程序，脚本不会再向下执行 */
			get_Type();            //调用一个没有被定义的函数
		?>
	</body>
</html>

