
# ThinkPHP


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















### thinkphp如何查看方法自动sql生成的sql语句
	echo M()->getLastSql();
	echo $User->getLastSql();  
	echo $User->_sql();  //输出上次执行的sql语句