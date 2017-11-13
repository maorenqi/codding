<?php
	class Acticle {   //����һ�������࣬������������Ա���Ա�������ݣ������Ҫ�����Ը���	
		private $subject;        //���µı����Ա����
		private $message;       //���µ��������ݳ�Ա����
		
		//���췽����ͨ���������±����������������µĲ���ѡ�����鴴�����¶���
		function __construct($subject=" ",$message=" ", $parse=array()) {
			$this->subject=$this->html2Text($subject); //Ϊ���±��⸳��ֵ����HTML���תΪʵ��
              
			if(!empty($parse)) {            //����û�ѡ���˶����µĲ���ѡ���������ɹ�
				foreach($parse as $value) {  //�û�ѡ���˼������²���ѡ����ѭ������
					switch($value) {      //�����û�ѡ��Ĳ�ͬѡ����ò�ͬ���ڲ���������
						case 1:         //����û�ѡ��ɾ��HTML��ǩ��ѡ��ʱ��������
							$message=$this->delHtmlTags($message);  
							break;
						case 2:        //���ѡ��ת��HTML��ǩΪʵ�塱ѡ��ʱ��������
							$message=$this->html2Text($message);
							break;	
						case 3:        //����û�ѡ��ʹ��UBB���롱ѡ��ʱ��������
							$message=$this->UBBCode2Html($message);
							break;
						case 4:        //����û�ѡ�񡰿���URLʶ��ѡ��ʱ��������
							$message=$this->parseURL($message);
							break;
						case 5:        //����û�ѡ��ʹ�ñ��顱ѡ��ʱ��������
							$message=$this->parseSmilies($message);
							break;
						case 6:        //����û�ѡ�񡰽��÷Ƿ��ؼ��֡�ѡ��ʱ��������
							$message=$this->disableKeyWords($message);
							break;
						case 7:        //����û�ѡ��PHP������Ϊ������ѡ��ʱ��������
							$message=$this->prasePHPCode($message);
							break;
						case 8:        //����û�ѡ��ԭ����ʾ��ѡ��ʱ��������
							$message=$this->prasePer($message);
							break;
						case 9:        //����û�ѡ��ͬ�����С�ѡ��ʱ��������
							$message=$this->nltobr($message);
							break;
					}
				}	
			}
	
			$this->message=$message;         //����Ա����$message����ֵ��
		}
		
		private function delHtmlTags($message) {  //��˽�з�������ɾ��HTML���
			return strip_tags($message);         //�����ַ���������ɾ��HTML���
		}

		private function html2Text($message) {   //��˽�з���������HTML���תΪHTMLʵ��
			return htmlSpecialChars(stripSlashes($message));  //�����ַ������������в���
		}

		private function UBBCode2Html($message) {   //��˽�з�����������UBB����
			$pattern=array('/\[b\]/i', '/\[\/b\]/i', '/\[i\]/i',   //����������ʽ��ģ������
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
    
			$replace=array('<b>', '</b>', '<i>',    //����������ʽ���滻����
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
			return preg_replace($pattern, $replace, $message);  //����������ʽ���滻����
		}
		private function cuturl($url) {      //��˽�з����������г���URL������������
			$length = 65;
			$urllink = "<a href=\"".(substr(strtolower($url), 0, 4) == 'www.' ? "http://$url" : $url).'" target="_blank">';
			if(strlen($url) > $length) {    //���URL���ȴ���65�����
				$url = substr($url, 0, intval($length * 0.5)).' ... '.substr($url, - intval($length * 0.3));
			}
			$urllink .= $url.'</a>';
			return $urllink;
		}

		private function parseURL($message) {   //��˽�з�����������URL�������������
$urlPattern="/(www.|https?:\/\/|ftp:\/\/|news:\/\/|telnet:\/\/){1}([^\[\"']+?)(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/ei"; 	
			return preg_replace($urlPattern, "\$this->cuturl('\\1\\2\\3\\4')", $message);
		}
	
		private function parseSmilies($message) {    //�˷���������������
			$pattern=array('/:\)|\/wx|΢Ц/i',        //���������������ʽģ������
					'/:@|\/fn|��ŭ/i',
					'/:kiss|\/kill|\/sa|ʾ��/',
					'/:p|\/tx|͵Ц/i',
					'/:q|\/dk|���/i' );
			$replace=array('<img src="smilies/smile.gif" alt="΢Ц">',  //����������滻����
					'<img src="smilies/huffy.gif" alt="��ŭ">',
					'<img src="smilies/kiss.gif" alt="ʾ��">',
					'<img src="smilies/titter.gif" alt="͵Ц">',
					'<img src="smilies/cry.gif" alt="���">');
			return preg_replace($pattern, $replace, $message);	     //����������ʽ���滻����
		}
		
		private function disableKeyWords($message) {   //�˷����������������еķǷ��ؼ���
			$keywords_disable=array("�Ƿ��ؼ���һ","�Ƿ��ؼ��ֶ�","�Ƿ��ؼ�����");
			return str_replace($keywords_disable,"**",$message);
		}

		private function prasePHPCode($message) {    //�˷���������PHP��������Ϊ����
			$pattern='/(<\?.*?\?>)/ise';
			$replace='"<pre style=\"background:#ddd\">".highlight_string("\\1",true)."</pre>"';
			return preg_replace($pattern, $replace, $message);	
		}
			
		private function prasePer($message) {        //�˷�������������ԭ�������������<pre>���
			return '<pre>'.$message.'</pre>';
		}

		private function nltobr($message) {          //��˽�з������������з���תΪ<br>���
			return nl2br($message);              //�����ַ���������nl2br()
		}	

		public function getSubject() {             //�˷���Ϊ���еģ��������µı���
			return '<h1 align=center>'.$this->subject.'</h1>';
		}

		public function getMessage() {           //�˷���Ϊ���еģ��������µ���������
			return $this->message;
		}
	}
?>
