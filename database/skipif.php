<?php
$config['database.auto_connect'] = false;
if (!defined('DATABASE')) {
	define('DATABASE', 'single');
}
require(dirname(__FILE__) . '/../webroot.conf.php');

if (DATABASE == 'single') {
	$host = $_ENV['config']['database.host'];
} else {
	$host = $_ENV['config']['database.master_host'];
}

$fp = @fsockopen($host, 3306, $errno, $errstr, 30);

if (!$fp) {
	echo 'skip Database server not running.';
}