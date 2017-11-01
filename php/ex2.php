<?php 
$var = "var"; 
if (isset($_GET["arg"])) 
{ 
$arg = $_GET["arg"]; 
eval("\$var = $arg;"); 
echo "\$var =".$var; 
} 
?> 
