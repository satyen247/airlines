<?php
echo "............Welcome ....Rudra";
echo "<br>";
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

//date_default_timezone_set('Asia/Singapore');

echo "<br>Please DELETE this file after checking<br>";
echo "<br>Today = ". date('Y m d H:i:s A');
echo "<br>Server Zone = ".date_default_timezone_get();
echo "<br>Timezone = ". date('T');


echo "<br><br>";
//$output = shell_exec('cat /etc/*-release');
//echo "<pre>$output</pre><br>";


$server_details = $_SERVER;
echo "<br> Server Name = ".$_SERVER['SERVER_NAME'];
echo "<br>Server IP = ".$server_details['SERVER_ADDR'];
echo "<br>HOST = ".$_SERVER['HTTP_HOST']."<br><br>";
echo "<br>My I.P. = ".$_SERVER['REMOTE_ADDR']."<br><br>";

echo "<pre>";
print_r($server_details);
echo "</pre>";

echo "<br>BasePath = ".$_SERVER['DOCUMENT_ROOT']."<br><br>";


$ds_separator = DIRECTORY_SEPARATOR;
echo "<br>Ds Separator = ".$ds_separator;
$file = __FILE__ ;
echo "<br>File = ".$file;
$root = dirname(dirname(dirname(__FILE__)));
echo "<br>Root = ".$root;
$app_dir = basename(dirname(dirname(__FILE__)));
echo "<br>App Dir = ".$app_dir;
$webroot_dir = basename(dirname(__FILE__));
echo "<br>Webroot Dir = ".$webroot_dir;
$webroot = dirname(__FILE__) . $ds_separator;
echo "<br>Webroot = ".$webroot;
$dir = dirname(__DIR__);
echo "<br>DIR = ".$dir;

echo "<br><br> DIR = ".dirname(__FILE__);

echo "<br>Self = ".basename($_SERVER['PHP_SELF']);

//echo "<br>Referre = ".$_SERVER['HTTP_REFERER'];
echo "<br><br>";
phpinfo();
?>