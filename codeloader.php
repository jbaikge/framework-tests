<?php
$tmp_path = '';
$file_path = getcwd();
$include_path = $file_path . DIRECTORY_SEPARATOR . 'code';
while ($file_path != ($tmp_path = dirname($file_path))) {
	$include_path .= PATH_SEPARATOR . ($file_path = $tmp_path) . DIRECTORY_SEPARATOR . 'code';
}
ini_set('include_path', $include_path);
require('load.php');
