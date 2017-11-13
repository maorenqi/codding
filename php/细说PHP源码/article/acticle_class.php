<?php
	class Acticle {   //声明一个文章类，其中有两个成员属性标题和内容，如果需要还可以更多	
		private $subject;        //文章的标题成员属性
		private $message;       //文章的主本内容成员属性
		
		//构造方法，通过传入文章标题和文章主体和文章的操作选项数组创建文章对象
		function __construct($subject=" ",$message=" ", $parse=array()) {
			$this->subject=$this->html2Text($subject); //为文章标题赋初值，将HTML标记转为实体
              
			if(!empty($parse)) {            //如果用户选择了对文章的操作选项则条件成功
				foreach($parse as $value) {  //用户选择了几个文章操作选项则循环几次
					switch($value) {      //根据用户选择的不同选项，调用不同的内部方法处理
						case 1:         //如果用户选择“删除HTML标签”选项时条件成立
							$message=$this->delHtmlTags($message);  
							break;
						case 2:        //如果选择“转换HTML标签为实体”选项时条件成立
							$message=$this->html2Text($message);
							break;	
						case 3:        //如果用户选择“使用UBB代码”选项时条件成立
							$message=$this->UBBCode2Html($message);
							break;
						case 4:        //如果用户选择“开启URL识别”选项时条件成立
							$message=$this->parseURL($message);
							break;
						case 5:        //如果用户选择“使用表情”选项时条件成立
							$message=$this->parseSmilies($message);
							break;
						case 6:        //如果用户选择“禁用非法关键字”选项时条件成立
							$message=$this->disableKeyWords($message);
							break;
						case 7:        //如果用户选择“PHP代码设为高亮”选项时条件成立
							$message=$this->prasePHPCode($message);
							break;
						case 8:        //如果用户选择“原样显示”选项时条件成立
							$message=$this->prasePer($message);
							break;
						case 9:        //如果用户选择“同步换行”选项时条件成立
							$message=$this->nltobr($message);
							break;
					}
				}	
			}
	
			$this->message=$message;         //给成员属性$message赋初值，
		}
		
		private function delHtmlTags($message) {  //此私有方法有来删除HTML标记
			return strip_tags($message);         //调用字符串处理函数删除HTML标记
		}

		private function html2Text($message) {   //此私有方法有来将HTML标记转为HTML实体
			return htmlSpecialChars(stripSlashes($message));  //调用字符串处理函数进行操作
		}

		private function UBBCode2Html($message) {   //此私有方法有来解析UBB代码
			$pattern=array('/\[b\]/i', '/\[\/b\]/i', '/\[i\]/i',   //声明正则表达式的模板数组
			       	'/\[\/i\]/i', '/\[u\]/i', '/\[\/u\]/i',              
				'/\[font=([^\[\<]+?)\]/i',                        
				'/\[color=([#\w]+?)\]/i',                       
				'/\[size=(\d+?)\]/i',                            
				'/\[size=(\d+(\.\d+)?(px|pt|in|cm|mm|pc|em|ex|%)+?)\]/i',   
				'/\[align=(left|center|right)\]/i',                  
				'/\[url=www.([^\["\']+?)\](.+?)\[\/url\]/is',          
				'/\[url=(https?|ftp|gopher|news|telnet){1}:\/\/([^\["\']+?)\](.+?)\[\/url\]/is',
				'/\[email\]\s*([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\s*\[\/email\]/i', 
				'/\[email=([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\](.+?)\[\/email\]/is', 
				'/\[img\](.+?)\[\/img\]/',                      
				'/\[\/color\]/i', '/\[\/size\]/i', '/\[\/font\]/i','/\[\/align\]/'  
			);
    
			$replace=array('<b>', '</b>', '<i>',    //声明正则表达式的替换数组
				'</i>', '<u>', '</u>',                     
				'<font face="\\1">',                           
				'<font color="\\1">',                         
				'<font size="\\1">',                          
				'<font style=\"font-size: \\1\">',                 
				'<p align="\\1">',                             
				'<a href="http://www.\\1" target="_blank">\\2</a>', 
				'<a href="\\1://\\2" target="_blank">\\3</a>',       
				'<a href="mailto:\\1@\\2">\\1@\\2</a>',          
				'<a href="mailto:\\1@\\2">\\3</a>',              
				'<img src="\\1">',                            
				'</font>', '</font>', '</font>', '</p>'             
			);
			return preg_replace($pattern, $replace, $message);  //调用正则表达式的替换函数
		}
		private function cuturl($url) {      //此私有方法用来剪切长的URL，并加上链接
			$length = 65;
			$urllink = "<a href=\"".(substr(strtolower($url), 0, 4) == 'www.' ? "http://$url" : $url).'" target="_blank">';
			if(strlen($url) > $length) {    //如果URL长度大于65则剪切
				$url = substr($url, 0, intval($length * 0.5)).' ... '.substr($url, - intval($length * 0.3));
			}
			$urllink .= $url.'</a>';
			return $urllink;
		}

		private function parseURL($message) {   //此私有方法用来解析URL，将其加上链接
$urlPattern="/(www.|https?:\/\/|ftp:\/\/|news:\/\/|telnet:\/\/){1}([^\[\"']+?)(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/ei"; 	
			return preg_replace($urlPattern, "\$this->cuturl('\\1\\2\\3\\4')", $message);
		}
	
		private function parseSmilies($message) {    //此方法用来解析表情
			$pattern=array('/:\)|\/wx|微笑/i',        //声明表情的正则表达式模板数组
					'/:@|\/fn|发怒/i',
					'/:kiss|\/kill|\/sa|示爱/',
					'/:p|\/tx|偷笑/i',
					'/:q|\/dk|大哭/i' );
			$replace=array('<img src="smilies/smile.gif" alt="微笑">',  //声明表情的替换数组
					'<img src="smilies/huffy.gif" alt="发怒">',
					'<img src="smilies/kiss.gif" alt="示爱">',
					'<img src="smilies/titter.gif" alt="偷笑">',
					'<img src="smilies/cry.gif" alt="大哭">');
			return preg_replace($pattern, $replace, $message);	     //调用正则表达式的替换函数
		}
		
		private function disableKeyWords($message) {   //此方法用来屏蔽文章中的非法关键字
			$keywords_disable=array("非法关键字一","非法关键字二","非法关键字三");
			return str_replace($keywords_disable,"**",$message);
		}

		private function prasePHPCode($message) {    //此方法用来将PHP代码设置为高亮
			$pattern='/(<\?.*?\?>)/ise';
			$replace='"<pre style=\"background:#ddd\">".highlight_string("\\1",true)."</pre>"';
			return preg_replace($pattern, $replace, $message);	
		}
			
		private function prasePer($message) {        //此方法用来将文章原样输出，即加上<pre>标记
			return '<pre>'.$message.'</pre>';
		}

		private function nltobr($message) {          //此私有方法用来将换行符号转为<br>标记
			return nl2br($message);              //调用字符串处理函数nl2br()
		}	

		public function getSubject() {             //此方法为公有的，返回文章的标题
			return '<h1 align=center>'.$this->subject.'</h1>';
		}

		public function getMessage() {           //此方法为公有的，返回文章的主体内容
			return $this->message;
		}
	}
?>
