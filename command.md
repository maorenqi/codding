# 
## 文件移动
> mv    /usr/lib/*    /001

是将 /usr/lib/下所有的东西移到/001/中。

> mv    /usr/lib/    /001

是将lib和其内部的所有东西移到/001/中。 此后，/usr里不再有lib; /001里有lib/及其原有的东西。

>df -h //查看磁盘使用情况


* du -sh //查看当前文件夹大小
* du -sh * //查看当前目录下各个文件的大小
* du -h  text.txt
* iftop -i eth1
* cp -rp /file1 /file2 //递归带原属性复制file1目录下的文件到file2目录
* :2,25 s/^/#/g  //2到25行加#

## 查找find
	find  -type f -name \*.html  -exec chmod 775 {} \;
	find  -type f -name \*.php  -exec chmod 400 {} \;
	find -mtime -10 -type f -name \ -exec rm -rvf {} \;
	find -mtime +30 -type f -name \ -exec rm -rvf {} \; //查找一月前
	find . -size 0 -exec rm {} \;
	find . -size 0 > /tmp/kong.txt
	find ./ -perm 755 -print   //查找权限为755的文件
	find www.pr0791.cn -type d -exec chmod 754 {} \;	//设置所有目录权限为 754
	find www.pr0791.cn -not -type d -exec chmod 644 {} \;	//设置文件权限为644
	find  ./  -mtime  -30  -type f  -exec ls -l  {} \; //查找：30天内被修改的文件
	find ./ -name "*.txt" -print //找到目录下所有的txt文件
	find ./ -name "*.txt" -exec rm -rf {} \;	//找到目录下所有的txt文件并删除
	find  ./ -name "*.php" -mtime  -30  -typef  -exec  ls -l  {} \;	//找到目录下所有的php文件 并且在30天之类被修改的文件
	find ./ -name "*.php" -mtime -30 -mtime +1 -type f -execls -l {} \;	//找到目录下所有的php文件，同时，满足 30天以内，1天之前的

## centos添加FTP账号
> /usr/sbin/useradd -d /pkg/web/www.prykweb.com/hospital/html/p021 -g ftp -s /sbin/nologin ftpp021  PryKw.Com%%1

## ubuntu添加账号
* sudo useradd -g www-data -d /pkg/web -s /bin/bash puruiadmin

## SCP远程传输文件
* scp -r root@116.28.63.205:/pkg/web205  /pkg/web208	//拷贝到本地208服
* scp -P 2222 -r root@219.153.71.188:/pkg/web205  /pkg/web208 //指定端口

## 压缩和解压
目录结构：

	Training
	    src/
	    classes/
	    lib/
	        postgresql
	        commons
	     .project
	     .classpath

打包它，但是要去掉jar文件和classes目录，当前目录在Training目录上一级：
> tar -zcvf training.tar.gz –exclude Training/classes –exclude *.jar Training

###批量解压
> for tar in *.tar.gz;do tar zxvf $tar;done

## iptables
### 防IP段访问
* iptables -I INPUT -s 103.229.127.0/24 -j DROP
* iptables -I INPUT -s 58.211.60.176 -j DROP
### IP白名单
* iptables -I INPUT -s 101.81.27.94 -j ACCEPT
### 添加IP黑名单
* iptables -A INPUT -s 121.40.191.224 -j DROP
### 删除IP规则
* iptables -D INPUT -s 121.40.191.224 -j DROP
````
-F 清空规则表中的规则
-X 删除一个空规则表
-Z 将规则表计数器清零
iptables -F
iptables -X
iptables -Z
````

## 判断设备跳转到移动端JS：
	if ((navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad|android|ios|symbianos|windows phone|windows ce|ucweb|midp)/i))) {
		window.location.href= "http://m.neweye.cn";
	}

##	软件的添加和删除 
> ln -s /pkg/web/www.p028.com/theme /pkg/web/w.p028.com/theme

删除软链接 确实是用rm 但是!!! 

* rm -fr xxxx/    加了个/  这个是删除文件夹
* rm -fr xxxx    没有/  这个是删除软链接

## MYSQL
### 解压压缩的数据表
* gzip -d pr0791.gz
* mysql -p pr0791 < pr0791
### 配远程数据库账号有权限
* grant SELECT,INSERT,UPDATE,DELETE,CREATE on p023.* to p023mysql @"%" identified by "123456";
* grant SELECT,INSERT,UPDATE,DELETE,CREATE  on gzdiscuz.* to gzdiscuzadmin @"localhost" identified by "123456";

* grant  ALL PRIVILEGES  on dbpurui.* to dbpurui@"%" identified by "123456";
* grant  ALL PRIVILEGES  on dbpurui.* to dbpurui@"localhost" identified by "123456";

* grant SELECT  on rencai_purui.* to rencai_purui @"%" identified by "123456";
* grant SELECT  on rencai_purui.* to rencai_purui @"localhost" identified by "123456";

* flush privileges;

> DELETE FROM user WHERE User=’user_name’ and Host=’host_name’; 
> DELETE FROM user WHERE User=’px_purui’;

### 查找4008-799-499替换为010-65863787
> UPDATE pr_news_data SET content = REPLACE(content,"4008-799-499","010-65863787");

	#判断是否存在数据库purui，有的话先删除
	drop database if exists purui;
	
	#判断是否存在表student，有的话先删除
	drop tabel if exists student;
	
	#创建表
	create table student(
		id int auto_increment primary key,
		name varchar(50),
		sex varchar(20),
		date varchar(50),
		content varchar(100)
	)default charset = utf8;
	
	#修改表
	ALTER TABLE 表名 ADD 字段名 <建表语句>【FIRST|AFTER 列名】
	ALTER TABLE users ADD email VARCHAR(30) NOT NULL;
	ALTER TABLE users ADD name VARCHAR(30) NOT NULL FIRST;

	// CHANGE除了更改类型外还能更改列名，而MODIFY不能实现这个功能
	ALTER TABLE users MODIFY telNo INT UNSIGNED DEFAULT '0';
	ALTER TABLE users CHANGE telN0 telNo INT UNSIGNED DEFAULT '0';

	#删除表
	drop table student;
	
	#查看表结构
	describe student; #可以简写为desc student;
	
	#插入数据
	insert into student values(null,'aa','男','1988-10-2','......');
	
	#查询表中的数据
	select * from student;
	
	#修改某一条数据
	update student set sex='男' where id=4;
	
	#删除数据
	delete from student where id=5;
	
	#and且
	select * from student where data>'1988-1-2' and date<'1988-12-1';
	
	#or或
	select * from student where data<'1988-1-2' or date>'1988-12-1';
	
	#between
	select * from student where data between '1988-1-2' and '1988-12-1';
	
	#in查询制定集合内的数据
	select * from student where id in ( 1,3,5);
	
	#排序asc升序   Desc降序
	select * from student order by id asc;
	
	#分组查询 #聚合函数
	select max(id),name,sex from student group by sex;
	select min(date) from student;
	select avg(id) as '平均数' from student;
	select count(*) from student; #统计表中的总数
	select count(sex) from student; #统计表中性别总数，若有一条数据中sex为空的话，就不予以统计
	select sum(id) from student;
	
	#查询第i条以后到第j条的数据
	select * from sutdent limit 2,5;  #显示第3条以后5条数据
	
	#复合性的查询
	select * from table_name1 where exists(select * from table_name2 where conditions)
	
	#查询结果不显示重复记录
	select distinct name from student where 1=1;
	
	DDL- 数据定义语言（Create ,Alter,Drop,Declare）
	DML-数据操纵语言（Select, Delete, Update, Insert）
	DCL-数据控制语言（Grant, Revoke, Commit, Rollback）
	
	#sql查询一张表的重复数据,其实就是找到一个唯一的或者你想要查的数据， 然后分组统计下就行了
	select user_name,count(*) as count from user_table group by user_name having count>1;
 