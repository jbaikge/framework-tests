<?php
$tmp_path = '';
$include_path = $file_path = dirname($_SERVER['SCRIPT_FILENAME']);
while ($file_path != ($tmp_path = dirname($file_path))) {
	$include_path .= PATH_SEPARATOR . ($file_path = $tmp_path) . DIRECTORY_SEPARATOR . 'code';
}
ini_set('include_path', $include_path);
require('load.php');
