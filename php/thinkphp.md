
# ThinkPHP
[基于ThinkPHP手册的一些摘要，手册链接：](http://document.thinkphp.cn/manual_3_2.html)

## 配置
### 读取配置
获取已经设置的参数值：C('参数名称')

	$model = C('URL_MODEL');
	C('my_config',null,'default_config');
	C('USER_CONFIG.USER_TYPE');

### 动态配置
设置新的值：  
C('参数名称','新的参数值');

	// 动态改变缓存有效期
	C('DATA_CACHE_TIME',60);
	
	// 获取已经设置的参数值
	C('USER_CONFIG.USER_TYPE');
	//设置新的值
	C('USER_CONFIG.USER_TYPE',1);

### 批量配置

	$config = array('WEB_SITE_TITLE'=>'ThinkPHP','WEB_SITE_DESCRIPTION'=>'开源PHP框架');
	C($config);


## 架构
### 模块化设计
http://serverName/index.php（或者其他应用入口文件）/模块/控制器/操作/[参数名/参数值...]

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


### 自动完成 
#### 规则定义
静态方式： 在模型类里面通过$_auto属性定义处理规则。  
动态方式： 使用模型类的auto方法动态创建自动处理规则。
定义规则都采用: 

	array(
		array(完成字段1， 完成规则，[完成条件，附加规则]),
		array(完成字段2， 完成规则，[完成条件，附加规则])，
		...
	);

	protected $_auto = array(
		array('status','1'), //新增时把status字段设置为1
		array('password','md5',3,'function'),//对password字段在新增和编辑的时候使md5函数处理
		array('name','getName',3,'callback'),//对name字段在新增和编辑的时候回调getName方法
		array('update_time','time',2,'function'),//对pudate_time字段在更新的时候写入当前时间戳
	);


### 视图
#### 模板主题
	// 在控制器中动态改变模板主题
	$this->theme('blue')->display('add');

#### 模板赋值
	$this->assign('name',$value);
	// 下面的写法是等效的
	$this->name = $value;
赋值后，就可以这样输出： {$name}

#### 模板渲染
渲染模板输出最常用的是使用display方法，调用格式：  
display('模板文件'[, '字符编码'][,'输出类型'])

	// 不带任何参数 自动定位当前操作的模板文件
	$this->display();

	表示调用当前模块下面的edit模板
	// 指定模板输出
	$this->display('edit'); 

	表示调用Member模块下面的read模板。
	$this->display('Member:read');
	
	表示调用blue主题下面的User控制器的edit模板。
	$this->theme('blue')->display('User:edit'); 

#### 获取模板地址
T([资源://][模块@][主题/][控制器/]操作,[视图分层])

	T('Public/menu')
	//返回 themes/simplebootx/Public/menu.html

	T（'User@Public/menu'）
	//返回 themes/User/Public/menu.html

#### 获取内容
fetch('模板文件')

### 模板
#### 变量输出
	{$name} 
 
	{$data.name}  
	{$data.email}  

	{$data['name']}  
	{$data['email']} 
 
	{$data:name}  
	{$data:email}  

	{$data->name}  
	{$data->email}

#### 系统变更
	{$Think.get.pageNumber}  //输出$_GET['pageNumber']变量
	{$Think.cookie.name}   //输出$_COOKIE['name']变量
	{$Think.MODULE_NAME} //常量输出
	{$Think.config.url_model} //配置输出
	{$Think.lang.page_error}
	{$Think.lang.var_error}


#### 使用函数
	{$data.name|md5}
	等价于<?php echo (md5($data['name'])); ?>
	{$name|md5|strtoupper|substr=0,3}
	<?php echo (substr(strtoupper(md5($name)),0,3)); ?>
	{:substr(strtoupper(md5($name)),0,3)}

#### 默认输出
	{$user.nickname|default="这家伙很懒，什么也没留下"}

#### 使用运算符
在使用运算符的时候，不再支持点语法和常规的函数用法。

	{$user.score+10} //错误的
	{$user['score']+10} //正确的
	{$user['score']*$user['level']} //正确的
	{$user['score']|myFun*10} //错误的
	{$user['score']+myFun($user['level'])} //正确的



#### 标签库
	<taglib name="html" />
	<taglib name="html,article" />
	
	<article:read name="hello" id="data" >
	{$data.id}:{$data.title}
	</article:read>
	
	<article:read>... </article:read> 就是闭合标签
	<article:read name="hello" /> 就是开放标签。

#### 内置标签
内置标签库无需导入即可使用，并且不需要加XML中的标签库前缀，ThinkPHP内置的标签库是Cx标签库，所以，Cx标签库中的所有标签，我们可以在模板文件中直接使用，我们可以这样使用：

	<eq name="status" value="1 >
	正常
	</eq>







### 模板继承
	<block></block>
	<block name="title"><title>标题</title></block>
	
	<extend name="base" />
#### 三元运算
	{$status?'正常'：'错误'}

#### 内置标签
##### Volist标签
	<volist name="list" id="vo">
		{$vo.id}:{$vo.name}<br />
	</volist>

	//输出其中的第5~15条记录
	<volist name="list" id="vo" offset="5" length='10'>
		{$vo.name}
	</volist>

	//为空的时候输出提示
	<volist name="list" id="vo" empty="暂时没有数据" >
		{$vo.id}|{$vo.name}
	</volist>

	//支持变理输出
	$this->assign('empty',"<span class='empty'>暂无数据</span>");
	$this->assign('list',$list);
	<volist name="list" id="vo" empty="$empty">
		{$vo.id}|{$vo.name}
	</volist>

如果没有指定key属性的话，默认使用循环变量i

##### Foreach 标签
<foreach name="list" item="vo">
	{$key}|{$vo}
</foreach>

<foreach name="list" item="vo" key="k">
	{$k}|{$vo}
</foreach>

##### For标签
开始值、结束值、步进值和循环变量都可以支持变量，开始值和结束值是必须，其他是可选。comparison 的默认值是lt;；name的默认值是i，步进值的默认值是1
	<for start="开始值" end="结束值" comparison="" step="步进值" name="循环变量名">
	</for>
	
	<for start="1" end="100">
		{$i}
	</for>
	
	//解析后的代码是
	for ($i=1; $i<100; $i+=1){
		echo $i;
	}
##### Switch标签
	<switch name="Think.get.userId">
		<case value="1">admin</case>
		<case value='2'>demo</case>
		<default /> default
	</switch>

##### 比较标签
	<比较标签 name="变量" value="值">
		eq neq gt egt lt elt heq nheq
	</比较标签>
	
	<eq name="name" value="value">value</eq>
	
	<eq name="name" value="value">
	相等
	<else />
	不相等
	</eq>
	
	
	<compare name="name" value="5" type="eq">value</compare>

##### 范围判断标签IN OR NOTIN
	<in name="id" value="1,2,3">
	id在范围内
	<else />
	id不在范围内
	</in>

	<between name="id" value="1,10">
	输出内容
	</between>
	
	<range name="id" value="1,5" type="in">
	</range>


##### If标签
	<if condition="($name eq 1) OR（$name gt 100">value1
	<elseif conditon="($name eq 2)" />value2
	<else /> value3
	</if>

##### Present标签
	<present name="name">
	name已经赋值
	</present>
	
	<notpresent name="name">
	</notpresent>


##### empty标签
	<empty name="name">
	name为空
	</empty>
	
	<notempty name="name">
	</notempty>
##### Defined标签
	<defined name="NAME">
	NAME常量已经定义
	</defined>
	<notdefined name="NAME">
	NAME常量未定义
	</notdefined>

##### Assign标签
	<assign name="var" value="123" />
	<assign name="Think.get.id" value="12" />
	<assign name="var" value="$val" />


##### Define标签
<define name="MY_D" value="3" />

##### 标签嵌套
系统内置的标签中，volist、switch、if、elseif、else、foreach、compare（包括所有的比较标签）、（not）present、（not）empty、（not）defined等标签都可以嵌套使用。
##### 使用PHP标签
	<php>echo 'Hello';</php>

#### 原样输出
	<literal>
		<if>
		</if>
	</literal>



### 缓存
#### 缓存初始化
	S(array(
		'type'=>'Xcache',
		'host'=>'localhost',
		'port'=>'11211',
		'prefix'=>'think',
		'expire'=>60
	));

	// 设置缓存
	S('name',$value);
	
	// 缓存数据300秒
	S('name',$value,300);
	
	// 采用文件方式缓存数据300秒
	S('name',$value,array('type'=>'file','expire'=>300));


	// 读取缓存
	$value = S('name');
	
	// 删除缓存
	S('name',null);




### 模型调试 thinkphp如何查看方法自动sql生成的sql语句
	echo M()->getLastSql();	
	echo $User->getLastSql(); 
	echo $User->_sql();  //输出上次执行的sql语句


### ThinkPHP 几个常用函数
	/**
	 * 获取和设置配置参数 支持批量定义
	 * @param string|array $name 配置变量
	 * @param mixed $value 配置值
	 * @param mixed $default 默认值
	 * @return mixed
	 */
	C($name=null, $value=null,$default=null)

	/**
	 * 抛出异常处理
	 * @param string $msg 异常消息
	 * @param integer $code 异常代码 默认为0
	 * @throws Think\Exception
	 * @return void
	 */
	E($msg, $code=0)
	
	/**
	 * 记录和统计时间（微秒）和内存使用情况
	 * 使用方法:
	 * <code>
	 * G('begin'); // 记录开始标记位
	 * // ... 区间运行代码
	 * G('end'); // 记录结束标签位
	 * echo G('begin','end',6); // 统计区间运行时间 精确到小数后6位
	 * echo G('begin','end','m'); // 统计区间内存使用情况
	 * 如果end标记位没有定义，则会自动以当前作为标记位
	 * 其中统计内存使用需要 MEMORY_LIMIT_ON 常量为true才有效
	 * </code>
	 * @param string $start 开始标签
	 * @param string $end 结束标签
	 * @param integer|string $dec 小数位或者m
	 * @return mixed
	 */
	G($start,$end='',$dec=4) 
	
	/**
	 * 获取和设置语言定义(不区分大小写)
	 * @param string|array $name 语言变量
	 * @param mixed $value 语言值或者变量
	 * @return mixed
	 */
	L($name=null, $value=null)
	
	/**
	 * ThinkCMF NOTE
	 * 获取模版文件 格式 资源://主题@模块/控制器/操作
	 * @param string $template 模版资源地址
	 * @param string $layer 视图层（目录）名称
	 * @return string
	 */
	T($template='',$layer='')

	/**
	 * 获取输入参数 支持过滤和默认值
	 * 使用方法:
	 * <code>
	 * I('id',0); 获取id参数 自动判断get或者post
	 * I('post.name','','htmlspecialchars'); 获取$_POST['name']
	 * I('get.'); 获取$_GET
	 * </code>
	 * @param string $name 变量的名称 支持指定类型
	 * @param mixed $default 不存在的时候默认值
	 * @param mixed $filter 参数过滤方法
	 * @param mixed $datas 要获取的额外数据源
	 * @return mixed
	 */
	I($name,$default='',$filter=null,$datas=null)

	/**
	 * 设置和获取统计数据
	 * 使用方法:
	 * <code>
	 * N('db',1); // 记录数据库操作次数
	 * N('read',1); // 记录读取次数
	 * echo N('db'); // 获取当前页面数据库的所有操作次数
	 * echo N('read'); // 获取当前页面读取次数
	 * </code>
	 * @param string $key 标识位置
	 * @param integer $step 步进值
	 * @param boolean $save 是否保存结果
	 * @return mixed
	 */
	N($key, $step=0,$save=false)

	/**
	 * 实例化模型类 格式 [资源://][模块/]模型
	 * @param string $name 资源地址
	 * @param string $layer 模型层名称
	 * @return Think\Model
	 */
	D($name='',$layer='') 
	
	/**
	 * 实例化一个没有模型文件的Model
	 * @param string $name Model名称 支持指定基础模型 例如 MongoModel:User
	 * @param string $tablePrefix 表前缀
	 * @param mixed $connection 数据库连接信息
	 * @return Think\Model
	 */
	M($name='', $tablePrefix='',$connection='') 

	/**
	 * 实例化多层控制器 格式：[资源://][模块/]控制器
	 * @param string $name 资源地址
	 * @param string $layer 控制层名称
	 * @param integer $level 控制器层次
	 * @return Think\Controller|false
	 */
	A($name,$layer='',$level=0) 
	
	/**
	 * 远程调用控制器的操作方法 URL 参数格式 [资源://][模块/]控制器/操作
	 * @param string $url 调用地址
	 * @param string|array $vars 调用参数 支持字符串和数组
	 * @param string $layer 要调用的控制层名称
	 * @return mixed
	 */
	R($url,$vars=array(),$layer='')
	
	/**
	 * 执行某个行为
	 * @param string $name 行为名称
	 * @param string $tag 标签名称（行为类无需传入） 
	 * @param Mixed $params 传入的参数
	 * @return void
	 */
	B($name, $tag='',&$params=NULL)
	
	/**
	 * URL组装 支持不同URL模式
	 * @param string $url URL表达式，格式：'[模块/控制器/操作#锚点@域名]?参数1=值1&参数2=值2...'
	 * @param string|array $vars 传入的参数，支持数组和字符串
	 * @param string|boolean $suffix 伪静态后缀，默认为true表示获取配置值
	 * @param boolean $domain 是否显示域名
	 * @return string
	 */
	U($url='',$vars='',$suffix=true,$domain=false)
	
	/**
	 * 渲染输出Widget
	 * @param string $name Widget名称
	 * @param array $data 传入的参数
	 * @return void
	 */
	W($name, $data=array())
	
	/**
	 * 缓存管理
	 * @param mixed $name 缓存名称，如果为数组表示进行缓存设置
	 * @param mixed $value 缓存值
	 * @param mixed $options 缓存参数
	 * @return mixed
	 */
	S($name,$value='',$options=null)
	
	/**
	 * 快速文件数据读取和保存 针对简单类型数据 字符串、数组
	 * @param string $name 缓存名称
	 * @param mixed $value 缓存值
	 * @param string $path 缓存路径
	 * @return mixed
	 */
	F($name, $value='', $path=DATA_PATH)