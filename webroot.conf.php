<?php
if (!defined('DATABASE')) {
	define('DATABASE', null);
}

switch (DATABASE) {
	case 'single':
		$config['database.host'] = 'localhost';
		$config['database.user'] = 'root';
		$config['database.pass'] = '';
		$config['database.name'] = 'test';
		mysql_connect($config['database.host'], $config['database.user'], $config['database.pass']);
		mysql_query("CREATE DATABASE IF NOT EXISTS " . $config['database.name']);
		mysql_close();
		break;
	case 'master/slave':
		$config['database.master_host'] = 'localhost';
		$config['database.master_user'] = 'root';
		$config['database.master_pass'] = '';
		$config['database.slave_host'] = 'localhost';
		$config['database.slave_user'] = 'root';
		$config['database.slave_pass'] = '';
		$config['database.name'] = 'test';
		mysql_connect($config['database.master_host'], $config['database.master_user'], $config['database.master_pass']);
		mysql_query("CREATE DATABASE IF NOT EXISTS " . $config['database.name']);
		mysql_close();
		break;
	default:
		$config['database.auto_connect'] = false;
		break;
}

$config['library.dir'] = dirname(dirname(__FILE__));
$config['cache.dir'] = '/tmp/framework-cache';

// Make anything that might be missing
if (!is_dir($config['cache.dir'])) {
	mkdir($config['cache.dir']);
}

require($config['library.dir'] . '/load.php');