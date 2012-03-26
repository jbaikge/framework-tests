<?php
$config['database.auto_connect'] = true;
$config['secret'] = 'fdb_test_secret';
if (!defined('DATABASE')) {
	define('DATABASE', 'master/slave');
}
require_once(dirname(__FILE__) . '/../webroot.conf.php');

//FDB::connect();
FDB::query("CREATE TABLE IF NOT EXISTS `fdb_test` (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	data TEXT, 
	PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8
");

FDB::query("TRUNCATE fdb_test");
FDB::query("INSERT INTO fdb_test (data) VALUES ('test 1'), ('test 2'), ('test 3')");

function fdb_test_clean() {}
