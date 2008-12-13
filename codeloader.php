<?php
$tmp_path = '';
$include_path = $file_path = getcwd();
while ($file_path != ($tmp_path = dirname($file_path))) {
	$include_path .= PATH_SEPARATOR . ($file_path = $tmp_path);
}
ini_set('include_path', $include_path);
require('webroot.conf.php');
