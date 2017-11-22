
# ThinkPHP
基于ThinkPHP手册的一些摘要，手册链接：http://document.thinkphp.cn/manual_3_2.html

## 模型

### CURD操作 数据创建
#### 创建数据对象
	$User = M('User');
	$User->create();
	
	$data['name'] = 'Garfield';
	$data['email'] = 'garfield@purui.cn';
	$User->create($data);

	echo $User->name;
	$User->name = 'guoguo';
	$User->status = 1;

> 系统内置的数据操作包括Model::MODEL_INSERT（或者1）和Model::MODEL_UPDATE（或者2），当没有指定的时候，系统根据数据源是否包含主键数据来自动判断，如果存在主键数据，就当成Model::MODEL_UPDATE操作。
> 
> Create方法创建的数据对象是保存在内存中，并没有实际写入到数据库中，直到使用add或者save方法才会真正写入数据库。

#### 字段合法性过滤
如果在create方法之前调用field方法，则表示只允许创建指定的字段数据，其他非法字段将会被过滤。

	$data['name'] = 'thinkphp';
	$data['email'] = 'thinkphp@gmail.com';
	$data['status'] = 1;
	$data['test'] = 'test';
	$User = M('User');
	$data = $User->field('name,email')->create($data);
	dump($data);
我们还可以直接在模型类里面通过设置insertFields和updateFields属性来定义允许的字段

### 数据写入
如果是Mysql数据库的话，还可以支持在数据插入时允许更新操作:

	add($data='',$options=array(),$replace=false)	
其中add方法增加$replace参数(是否添加数据时允许覆盖)，true表示覆盖，默认为false。

3.2.3版本开始，可以支持不执行SQL而只是返回SQL语句，例如：
	
	$User = M("User"); // 实例化User对象
	$data['name'] = 'ThinkPHP';
	$data['email'] = 'ThinkPHP@gmail.com';
	$sql = $User->fetchSql(true)->add($data);
	echo $sql;
	// 输出结果类似于
	// INSERT INTO think_user (name,email) VALUES ('ThinkPHP','ThinkPHP@gmail.com')

#### 批量写入
	$dataList[] = array('name'=>'thinkphp','email'=>'garfield@purui.cn');
	$dataList[] = array('name'=>'onthink','email'=>'garfield@purui.cn');
	$User->addAll($dataList);

### 数据读取
某些情况下有些连贯操作是无效的，例如limit方法对find方法是无效的。

读取数据是指读取数据表中的**一行数据**（或者关联数据），主要通过find方法完成。

#### 读取数据集
读取数据集其实就是获取数据表中的**多行记录**（以及关联数据），使用select方法。

#### 读取字段值
读取字段值其实就是获取数据表中的某个列的多个或者单个数据，最常用的方法是 getField方法。


### 更新数据
更新数据使用save方法。

#### 更新字段
如果只是更新个别字段的值，可以使用setField方法。
	$User-> where('id=5')->setField('name','ThinkPHP');
	$data = array('name'=>'ThinkPHP','email'=>'ThinkPHP@gmail.com');
	$User-> where('id=5')->setField($data);

而对于统计字段（通常指的是数字类型）的更新，系统还提供了setInc和setDec方法。
	$User->where('id=5')->setInc('score',3); // 用户的积分加3
	$User->where('id=5')->setInc('score'); // 用户的积分加1
	$User->where('id=5')->setDec('score',5); // 用户的积分减5
	$User->where('id=5')->setDec('score'); // 用户的积分减1


### 数据删除
ThinkPHP删除数据使用delete方法。

	$Form->delete(5);
	$User->where('id=5')->delete(); // 删除id为5的用户数据
	$User->delete('1,2,5'); // 删除主键为1,2和5的用户数据
	$User->where('status=0')->delete(); // 删除所有状态为0的用户数据
	$User->where('1')->delete(); //删除表中所有记录
	
### 动态查询
getBy动态查询

	$User->getByName('Tom');
	$User->getByEmail('a@b.com');

getFieldBy
	
	$User->getFieldByName('Tom','id')
表示根据用户的name获取用户的id值。

### 字段验证
验证规则
1.静态方式：在模型类里面通过$_validate属性定义验证规则。

	protected $_validate = array(
		array(),
		array()	
	);
2.动态方式：使用模型类的 validate方法动态创建自动验证规则。

	$rule = array(
		array(),
		array()	
	);
	if(!$User->validate($rule)->create()){

	}

格式：

	array(
		array(验证字段1，验证规则，提示错误，[验证条件，附加规则，验证时间])，
		array(验证字段2，验证规则，错误提示，[验证条件，附加规则，验证时间])，
		......
	)
#### 验证字段
表单字段、数据库字段都行，验证字段可以随意设置。
#### 验证规则
附加规则。系统内置了一些常用正则验证规则，可直接做为验证规则使用。
require 字段必须、 email 邮箱、 url URL地址、 currency 货币、 number 数字。
#### 提示信息
验证失败后的提示信息
#### 验证条件
self::EXISTS_VALIDATE 或者0 存在字段的验证（默认）
self::MUST_VALIDATE 或者1 必须验证
self::VALUE_VALIDATE 或者2 值不为空时候的验证
#### 附加规则
	regex 		正则验证
	function 	函数验证
	callback	方法验证，定义的规则
	confirm		验证表单中的两个字段是否相同
	equal		验证是否等于某个值
	notequal	验证是否不等于某个值
	in			验证是否在某个范围内
	notin		验证是否不在某个范围内
	length		验证长度
	between		验证范围
	notbetween	验证不在某个范围
	expire		验证是否在有效期
	ip_allow	验证IP是否允许
	ip_deny		验证IP是否禁止
	unique		验证是否唯一

#### 验证时间
self::MODEL_INSERT	或者1 新增数据时验证
self::MODEL_UPDATE	或者2 编辑数据时验证
self::MODEL_BOTH	或者3 全部情况下验证






### thinkphp如何查看方法自动sql生成的sql语句
	echo M()->getLastSql();
	echo $User->getLastSql();  
	echo $User->_sql();  //输出上次执行的sql语句