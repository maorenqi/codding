<?php
//��������UBB������ı�
$text="�����б��ı�[b]�Ӵ�[/b]
	�������ı���Ϊ[i]б��[/i]
	�������ı�����[u]�»���[/u]
	�������ִ�СΪ[size=7][color=red]7���֣���ɫ[/color][/size]
	[align=center]�����о���[/align]
	���ӵ�[url=http://bbs.lampbrother.net/]LAMP�ֵ���[/url]
	[url]������Ӻܳ������ض�������Ӻܳ������ض�������Ӻܳ������ض�[/url]
	��[email=skygao@lampbrother.net]�����[/email]����
	�ڴ˴�����[img]http://bbs.lampbrother.com/images/Sharp/logo.gif[/img]ͼƬ
	[b][i][u][align=center]����Ϊ�Ӵ֡�б�岢�����»��ߣ����Ҿ��е�����[/align][/u][/i][/b]";

//�����Զ���Ľ�UBB����ת��ΪHTML����ĺ���
echo UBBCode2Html($text);
 
function UBBCode2Html($text) {   //ͨ���Զ���ĺ�����UBB����ת��ΪHTML�����ʽ
	//����һ��������ʽ��ģʽ���飬������preg_replace()�����ĵ�һ������
$pattern=array('/(\r\n)|(\n)/', '/\[b\]/i', '/\[\/b\]/i',               //ƥ�任�к�UBB�����е�[b]��[/b]
		'/\[i\]/i', '/\[\/i\]/i', '/\[u\]/i', '/\[\/u\]/i',                   //ƥ��UBB�����е�[i]��[u]
		'/\[font=([^\[\<]+?)\]/i',                             //ƥ��UBB�����е�[font]
		'/\[color=([#\w]+?)\]/i',                             //ƥ��UBB�����е�[color]
		'/\[size=(\d+?)\]/i',                                 //ƥ��UBB�����е�[size]
		'/\[size=(\d+(\.\d+)?(px|pt|in|cm|mm|pc|em|ex|%)+?)\]/i',  //ƥ��UBB�����е�[size]������λ
		'/\[align=(left|center|right)\]/i',                       //����ƥ��UBB�����е�[align]
		'/\[url=www.([^\["\']+?)\](.+?)\[\/url\]/is',               //����ƥ��UBB�����е�[url]
		'/\[url=(https?|ftp|gopher|news|telnet){1}:\/\/([^\["\']+?)\](.+?)\[\/url\]/is',
		'/\[email\]\s*([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\s*\[\/email\]/i',  //ƥ��[email]
		'/\[email=([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\](.+?)\[\/email\]/is', //ƥ��[email]		
		'/\[img\](.+?)\[\/img\]/',                             //ƥ��UBB�����е�[img]��[/img]
		'/\[\/color\]/i', '/\[\/size\]/i', '/\[\/font\]/i','/\[\/align\]/'       //ƥ��UBB�����е�һЩ�������
		);
     //����һ���滻���飬�����䴫��preg_replace()�����еĵڶ�����������������������ݶ�Ӧ
	$replace=array('<br>','<b>', '</b>',                   //�滻���б�Ǻ�UBB�е�[b]��[/b]���
		'<i>', '</i>', '<u>', '</u>',                       //�滻UBB�����е�[i]��[u]���
		'<font face="\\1">',                           //�滻UBB�����е�[font]���
		'<font color="\\1">',                          //�滻UBB�����е�[color]���
		'<font size="\\1">',                           //�滻UBB�����е�[size]���
		'<font style=\"font-size: \\1\">',                 //�滻UBB�����е�[size]������λ
		'<p align="\\1">',                             //�滻UBB�����е�[align]���
		'<a href="http://www.\\1" target="_blank">\\2</a>',  //�滻UBB�����е�[url]���
		'<a href="\\1://\\2" target="_blank">\\3</a>',       //�滻UBB�����е�[url]���
		'<a href="mailto:\\1@\\2">\\1@\\2</a>',          //�滻UBB�����е�[email]���
		'<a href="mailto:\\1@\\2">\\3</a>',              //�滻UBB�����е�[email]���
		'<img src="\\1">',                            //�滻UBB�����е�[img]���
		'</font>', '</font>', '</font>', '</p>'              //�滻UBB�����е�һЩ�������
	);
	return preg_replace($pattern, $replace, $text);
}
?>
