<?php 
//根据域名列表得出IP

$dm = 'www.prykweb.com';
/* $dm=array('www.prykweb.com',
				'www.p028.com',
				'www.pr0791.com',
				'www.pr027.com',
				'www.027pryk.com',
				'mob.pr0791.com',
				'mob.pr027.com',
				'mob.p028.com',
				'm.pr0791.com',
				'm.pr027.com',
				); */
				
/* $dm=array('www.purui.cn',
				'www.p0931.com',
				'www.p0371.com',
				'www.hneyes.com',
				'www.p0451.com',
				'www.bjpryk.com',
				'mob.p0931.com',
				'mob.p0371.com',
				'm.p0931.com',
				'm.p0371.com',
				'gd.purui.cn',
				'www.puruiykh.com',

				
				); */
				
 /* $dm=array('www.zzpr0371.com',
				'www.ynyanke.com',
				'www.ynjinshi.com',
				'www.yanke0551.com',
				'www.shpryk.com',
				'www.purui027.com',
				'www.purui021.com',
				'www.purui010.com',
				'www.prykyy0871.com',
				'www.prykyy0791.com',
				'www.prykyy0551.com',
				'www.prykyy028.com',
				'www.ifs150.com',
				'www.hrbpryk.com',
				'www.hfpryk.com',
				'www.hfpr120.com',
				'www.cdpryk.com',
				'www.5i5eye.com',
				'wap.yanke0551.com',
				'wap.purui0551.com',
				'wap.ifs150.com',
				'wap.hfpryk.com',
				'wap.hfpr120.com',
				'm.zzpr0371.com',
				'm.bjpryk.com',
				'www.zzpr0371.com',
				'www.puruiybc.com',
				'm.puruiykh.com',
				'',
				); */
				
/* $dm=array('',
				'',
							
				);  */
/* $dm=array('www.kmprykyy.com',
				'www.purui0871.com',
				'mob.kmprykyy.com',
				'm.ynyanke.com',
				'm.ynjinshi.com',
				'm.pryk0871.com',
				'm.kmprykyy.com',			
				'www.p0871.com',			
				);  */
/* $dm=array('www.p023.com',
				'www.purui023.com',
				'www.prykyy023.com',
				'www.cqprykyy.com',
				'www.cqpryk.com',
				'www.cqpr023.com',
				'mob.p023.com',
				'm.p023.com',
							
				);	 */
$dm=array('www.pr021.com',
				'www.p0551.com',
				'wap.pryk021.com',
				'wap.p0551.com',
				'shyy.pr021.com',
				'shtj.pr021.com',
				'mob.pr021.com',
				'mob.p0551.com',
							
				);				
foreach($dm as $v){
	echo $v.'IP IS:<font color=\'red\'>'.gethostbyname($v).'</font><br />';
}

