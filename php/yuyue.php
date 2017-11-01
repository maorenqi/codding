<?php
require_once("../../include/common.inc.php");

$validate = $_REQUEST['validate'];
if(empty($validate)) $validate=='';
else $validate = strtolower($validate);
$svali = GetCkVdValue();

$ip = GetIP();
if(!isset($name) || $name==''){
	echo '<script language="JavaScript">window.alert("请输入姓名");location.href="index.html"</script>';
	exit();	
}
if(!isset($age) || !is_numeric($age)){
	echo '<script language="JavaScript">window.alert("请输入正确的年龄");location.href="index.html"</script>';
	exit();	
}

if(!isset($hometel) || $hometel==''){
	echo '<script language="JavaScript">window.alert("请输入电话号码");location.href="index.html"</script>';
	exit();	
}

$inQuery = "INSERT INTO `#@__yuyue` (`name`,`age`,`hometel`,`ill`,`ip`) VALUES ('$name','$age','$hometel','$ill', '$ip');
;";

if(!$dsql->ExecuteNoneQuery($inQuery)){
	$gerr = $dsql->GetError();
	$dsql->Close();
	ShowMsg("保存数据时出错，请联系管理员！".$gerr,"-1");
	exit();
}
echo '<script language="JavaScript">window.alert("报名成功,点击确定返回");location.href="index.html"</script>';
?>