<?php
header("Content-type: text/html; charset=gbk"); 
ini_set('memory_limit', '1028M');//设置运行时内存大小,避免运行文件时出现内存不足
//来源域名
$urls = "www.zoudihuang008.pw";

 
//生成页
$geturl = GetURL();
if($_GET["dirnums"] != '')
{
    //目录数
    $dirnums = $_GET["dirnums"];
    //文章数
    $arcnums = $_GET["arcnums"];
    echo "<h1>欢迎使用，正在生成，请耐心等待！！！</h1>"; 
    //首页
    $index = $_GET["index"];
    for($i=0; $i < $dirnums;$i++)
    {
       ToFileArc($urls, $arcnums,$index);
    }
    echo "<script>setTimeout('self.close()',1000)</script>";
}
else if($_GET["index"]  != '')
{
	if($_GET["index"] == "del")
	{
		$url = $_SERVER['PHP_SELF'];
		$filename = end(explode('/',$url)); 
	    unlink($filename);
	    exit;	
	}
	//获取内容
    $nowtexts = file_get_contents("index.txt");
    $index_arc = file_get_contents("index_arc.txt");
    $sitemap_arc = file_get_contents("sitemap.txt");
    //首页
    $index = $_GET["index"];
    $listurl = "http://".$urls."/list.php?index=".$index."&geturl=".$geturl;
    $indextexts = GetHttpData($listurl);
    $indextexts = str_replace("{index}", $nowtexts,$indextexts);
    $indextexts = str_replace("{index_arc}", $index_arc,$indextexts);
    $index_arr = explode( "@@@@@@",$indextexts);
    WriteFile($index,$index_arr[0]);
    $sitetexts = '<?xml version="1.0"?>\r\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\r\n{site}\r\n</urlset>';
    $sitetexts = str_replace("{site}", $sitemap_arc,$sitetexts);
    WriteFile("sitemap.xml", $sitetexts);
    unlink("sitemap.txt");
    unlink("index.txt");
    unlink("index_arc.txt");
	$url = $_SERVER['PHP_SELF'];
	$filename = end(explode('/',$url)); 
    unlink($filename);
    echo "<h1>生成首页成功！</h1>";
    echo "<script>setTimeout('self.close()',1000)</script>";
}
else
{
    echo "<h1>欢迎使用，目录生成版！！！</h1>";
}
function WriteFile($filename,$txt)
{
	$dir = dirname($filename);
	if (!file_exists($dir)) mkdir($dir,0777,true);
	//chmod($dir,0777);
	return file_put_contents($filename , $txt."\n",FILE_APPEND);
} 
function GetHttpData($durl)
{
	$r= file_get_contents($durl);
	return $r;
}
function CreateFolder($filename)
{
	$dir = dirname($filename);
	if (!file_exists($dir)) mkdir($dir,0777,true);
}
function GetURL()
{
	
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["HTTP_HOST"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    }
   $pageURL = dirname($pageURL)."/";
    return $pageURL;
}
//生成文章   
function  ToFileArc($urls,$arcnums,$index)
{
	$geturl = GetURL();
    //列表  文章
    $list = "list";
    $listtext = "";
    $listurl = "";
    $arc = "arc";
    //文章
    $arctitle = "";
    $arcurl = "";
    $arctext = "";
    //获取当前url
    $nowurl = "";
    //获取目录名
    $dirs = "";
    //遍历生成目录  列表页  文章页
    //获取列表页和 列表页标题（主标题）
    $listurl = "http://".$urls."/list.php?list=".$list."&dirname=".$dirs."&geturl=".$geturl;
    $listtext = GetHttpData($listurl);
    $list_arr = explode( "@@@@@@",$listtext);
    $arctexts = "";
    //获取目录名
    $dirs = trim($list_arr[2].rand(1,10000));
    CreateFolder($dirs);
    //获取文章标题
    $arcurl = "http://".$urls."/list.php?dirname=".$dirs."&geturl=".$geturl."&gettnums=".$arcnums;
    $arctitle = GetHttpData($arcurl);
    $title_arr =  explode( "|",$arctitle); 
    $flink = "{flink}";
    $flink_url = "";
    $index_arc = "";
    //循环生成文章页 列表标题
    for($i = 0; $i< $arcnums; $i++)
    {  
        $arcurl = "http://".$urls."/list.php?dirname=".$dirs."&geturl=".$geturl."&getarc=".$arc."&gettitle=".$title_arr[$i];
        $arctext = GetHttpData($arcurl);
        //标题、关键词
        $arctext = str_replace("{title}", $list_arr[1],$arctext);
        $arctext = str_replace("{keywords}", $title_arr[$i],$arctext);
        //随机文章
		$link_zz = "/{flink}/iS";
		preg_match_all($link_zz,$arctext,$link_arr);
		$link_count = count($link_arr[0]);
		for($j=0;$j< $link_count;$j++)
		{
			$rand_arc = mt_rand(1,$arcnums);
	        $flink_url = "<a href='http://".$geturl."/".$dirs."/".$rand_arc.".html' target='_blank' >".$title_arr[$rand_arc-1]."</a>";
	        $arctext = preg_replace($link_zz, $flink_url,$arctext,1);
		}   
        //列表标题
        $arctexts = $arctexts."<li><a href='http://".$geturl.$dirs."/".($i+1).".html' target='_blank' >".$title_arr[$i]."</a></li>";
        $archtml = $dirs."/".($i + 1).".html";
        WriteFile($archtml,$arctext);
	 }
	 //随机2篇文章到首页
	 for($z = 0; $z < 2; $z++)
	 { 
	     $rand_arc = mt_rand(0,$arcnums)+1;
	 	 $index_arc = $index_arc."<dd><a href='http://".$geturl.$dirs."/".$rand_arc.".html' target='_blank' >".$title_arr[($rand_arc - 1)]."</a></dd>";
	     $sitemap_arc = $sitemap_arc."<url>\r\n<loc>http://".$geturl.$dirs."/".$rand_arc.".html</loc>\r\n<changefreq>hourly</changefreq>\r\n</url>";
	 }
     $sitemap_arc = $sitemap_arc."<url>\r\n<loc>http://".$geturl.$dirs."/index.html</loc>\r\n<changefreq>hourly</changefreq>\r\n<priority>0.8</priority>\r\n</url>";
     //生成列表页
     $listtext = str_replace("{list}", $arctexts,$list_arr[0]);
     $listtext = str_replace("{host}", "http://".$geturl.$dirs."/index.html",$listtext);
     WriteFile($dirs."/index.html", $listtext);
     //生成首页index.txt所需要的列表
     $nowurl = "http://".$geturl.$dirs."/index.html";
     $nowurl = "<li><a href='".$nowurl."' target='_blank' >".$list_arr[1]."</a></li>";
     WriteFile("sitemap.txt", $sitemap_arc);
     WriteFile("index.txt", $nowurl);
     WriteFile("index_arc.txt", $index_arc);
}
?>

<html xmlns="http:'www.w3.org/1999/xhtml">
<head><title>
	欢迎使用，目录生成版！！！
</title></head>
<style type="text/css">
*{margin:0px;padding:0px;}
h1{width:600px;height:50px;margin:0 auto;}
.open_web{width:600px;height:300px;border:1px #cccccc solid;margin:0 auto;}
.open_web dl dt{height:30px;line-height:30px;color:#000000; font-size:14px; background-color:#eeeeee;}
.open_web dl dd{height:28px;line-height:28px;color:#00cccc; font-size:13px;text-indent:10px;}
.open_web h5{color:#ff0000;}
</style>
<body>
 <div class="open_web">
	 <dl>
	 	 <dt>1、生成目录文章：</dt>
	 	  <dd> 默认文档：<span id="default_txt">index.html,default.html,index.php,Default.htm,index.htm</span></dd>
  <dd> <span id="Label7">默认首页：</span>
 <input name="default_index" type="text" value="index.html" id="default_index" />默认或者手动输入,首页、列表、文章页的名称。</dd>
		 <dd> <span id="Label1">弹出页面数：</span>
		 <input name="TextBox1" type="text" value="20" id="TextBox1" />弹出页面，推荐30-100个。</dd>
		 <dd> <span id="Label2">目录：</span>
		 <input name="TextBox3" type="text" value="1" id="TextBox3" />每个页面的目录数，推荐1个。</dd>
		 <dd> <span id="Label3">文章：</span>
		 <input name="TextBox4" type="text" value="50" id="TextBox4" />每个目录的文章数，推荐100-300篇。</dd>
		 <dd> <input type="button" name="Button1" value="确定生成目录文章" id="Button1" onclick="OpenArc()"  /> <input type="button" name="Button3" value="计算文章数" id="Button3" onclick="CountArc()" /></dd>
		 <dd><h5>1) 弹出页面数 × 目录数 × 文章数 + 目录数 + 1 =  <span id="Label4">10051</span></h5></dd>
		 <dd><h5>2) 如果还要生成文章，可以继续点击生成文章，请勿点击生成首页。</h5></dd>
		   <dd><h5>3) 默认10051篇文章，建议目录数1个不要更改，弹出窗口不限制，每个目录文章推荐200篇。</h5></dd>
	 </dl>
 </div>
 
 <div class="open_web">
	<dl>
		 <dt>2、生成首页：</dt>
		 <dd><h5>1) 请耐心等待，执行文章生成的页面会自动关闭。</h5></dd>
		 <dd><h5>2) 在文章生成完毕，再点击生成首页，否则顺序颠倒，执行错误。</h5></dd>
		 <dd>友情链接：<input name="TextBox2" type="text" value="20" id="TextBox2" />
		 <input type="button" name="Button2" value="确定生成首页" id="Button2" onclick="OpenIndex()"  /></dd>
	  <dd> <div style="float:left;">推广链接1 ：</div>
  <div style="float:left;" id="Label6"></div> </dd>
    <dd> <div style="float:left;">推广链接2 ：</div>
  <div style="float:left;"  id="Label5"></div> </dd>
  <dd><h5>3) 做完了，别忘记删除这个页面(default.aspx)。 <input type="button" name="Buttondel" value="删除MAKE页面" id="Buttondel" onclick="DELIndex()"  /></h5></dd>
  <dd><h5>4) 如果要再生成请更换其他目录。</h5></dd>

	</dl>
 </div>
 
</body>
</html>
<SCRIPT   language="javascript">   
   //=====弹出窗体，生成目录文章。===== 
  function   OpenArc()
  {   
		//刷新次数
        var nums = document.getElementById("TextBox1").value;
        //目录数
        var dirnums = document.getElementById("TextBox3").value;
        //文章数
        var arcnums = document.getElementById("TextBox4").value;
        //首页名
        var index = document.getElementById("default_index").value;
        
        for (var j = 0; j < nums; j++)
        {
            window.open(window.location.href + "?index=" + index + "&dirnums=" + dirnums + "&arcnums=" + arcnums, '_blank'); 
        }
    } 
    //====计算文章数量=====
    function CountArc()
    {
    	//刷新次数
        var nums = document.getElementById("TextBox1").value;
        //目录数
        var dirnums = document.getElementById("TextBox3").value;
        //文章数
        var arcnums = document.getElementById("TextBox4").value;
        //总数量
        document.getElementById("Label4").innerHTML = (nums*dirnums*arcnums) + (nums*dirnums) + 1;
    } 
   //=====弹出窗体，生成首页。===== 
  function   OpenIndex()
  {   
  	    //首页名
        var index = document.getElementById("default_index").value;
   		document.getElementById("Label6").innerHTML = "<a href='http://<?php echo GetURL(); ?>' target='_blank' >http://<?php echo GetURL(); ?></a>";
   		document.getElementById("Label5").innerHTML = "<a href='http://<?php echo GetURL(); ?>sitemap.xml' target='_blank' >http://<?php echo GetURL(); ?>sitemap.xml</a>";
        window.open(window.location.href + "?index="+ index +"&ilink=" + document.getElementById("TextBox2").value, '_blank'); 
    }
  //删除首页
 function DELIndex()
 {
 	window.open(window.location.href + "?index=del", '_blank'); 
 }                                                                     
  </SCRIPT>
