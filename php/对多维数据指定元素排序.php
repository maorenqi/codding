<?php 
$str =array('1'=>array("id"=>'9',"c_name"=>"院长","order_setting"=>'130'),
				'5'=>array("id"=>'8',	"c_name"=>"副院长","order_setting"=>'125'),
				'7'=>array("id"=>'6',	"c_name"=>"主任","order_setting"=>'120'),
				'3'=>array("id"=>'11',"c_name"=>"副主任","order_setting"=>'110'),
				'2'=>array("id"=>'14', "c_name"=>"医生","order_setting"=>'45')
  );
 
$ages = array();
foreach ($str as $user) {
    $ages[] = $user['order_setting'];
}
array_multisort($ages, SORT_DESC, $str);
echo '<pre />';
var_dump($str);