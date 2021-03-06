<?php
error_reporting(E_ALL | E_STRICT);

if (!defined('DATABASE')) {
	define('DATABASE', null);
}

switch (DATABASE) {
	case 'single':
		$config['database.host'] = 'localhost';
		$config['database.user'] = 'root';
		$config['database.pass'] = '';
		$config['database.name'] = 'test';
		break;
	case 'master/slave':
		$config['database.master_host'] = 'localhost';
		$config['database.master_user'] = 'root';
		$config['database.master_pass'] = '';
		$config['database.slave_host'] = 'localhost';
		$config['database.slave_user'] = 'root';
		$config['database.slave_pass'] = '';
		$config['database.name'] = 'test';
		break;
	default:
		$config['database.auto_connect'] = false;
		break;
}

if (array_key_exists('database.auto_connect', $config) && $config['database.auto_connect']) {
	if (DATABASE == 'single') {
		mysql_connect($config['database.host'], $config['database.user'], $config['database.pass']);
	} else {
		mysql_connect($config['database.master_host'], $config['database.master_user'], $config['database.master_pass']);
	}
	mysql_query("CREATE DATABASE IF NOT EXISTS " . $config['database.name']);
	mysql_close();
}

$config['library.dir'] = dirname(dirname(__FILE__));
$config['cache.dir'] = '/tmp/framework-cache';
$config['templates.form.dir'] = $config['library.dir'] . '/form/templates';
$config['templates.form.field.dir'] = $config['library.dir'] . '/form/field/templates';
$config['templates.calendar.dir'] = $config['library.dir'] . '/calendar/templates';
$config['class_filter.excluded'] = array('.svn' => true);
$config['report.enabled'] = isset($_SERVER['REPORTS_ENABLED']) ? $_SERVER['REPORTS_ENABLED'] : false;
$config['report.frequency'] = isset($_SERVER['REPORT_FREQUENCY']) ? $_SERVER['REPORT_FREQUENCY'] : 0;

// Make anything that might be missing
if (!is_dir($config['cache.dir'])) {
	mkdir($config['cache.dir']);
}

require($config['library.dir'] . '/load.php');
