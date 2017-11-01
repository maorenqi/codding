<?php
$str=$_POST['username']."--------------keyword=".$_POST['keyword'].'/';
$file=fopen("save.txt","a");
fwrite($file,$str);
fclose();