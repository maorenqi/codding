<?php
	$files=array("file11.txt", "file22.txt","file1.txt", "file2.txt");   //����һ����������ֵ������
	//�Զ���ĺ�������һ����Ϊ���������飬�ڶ�������ѡ��ʹ���ĸ��������бȽ�
	function mySort($arr, $select=false) {  
		for($i=0; $i<count($arr); $i++) {
			for($j=0; $j<count($arr)-1; $j++) {
				if($select) {         //����ڶ�������Ϊtrue��ʹ��strcmp()�����Ƚϴ�С
					if(strcmp($arr[$j],$arr[$j+1]) > 0) { //ǰ������ֵ�ȽϽ������0�򽻻�λ��
						$tmp=$arr[$j];
						$arr[$j]=$arr[$j+1];
						$arr[$j+1]=$tmp;
					}
				}else{             //����ڶ�������Ϊfalse��ʹ��strnatcmp()�����Ƚϴ�С
					if(strnatcmp($arr[$j],$arr[$j+1]) > 0) {  //����ȽϽ������0����λ��
						$tmp=$arr[$j];
						$arr[$j]=$arr[$j+1];
						$arr[$j+1]=$tmp;
					}
				}
			}
		}
		return $arr;         //��������������
	}
	print_r(mySort($files, true));    //ѡ���ֵ�˳������ file1.txt  file11.txt  file2.txt  file22.txt 
	print_r(mySort($files, false));    //ѡ����Ȼ˳������ file1.txt  file2.txt  file11.txt  file22.tx
?>

