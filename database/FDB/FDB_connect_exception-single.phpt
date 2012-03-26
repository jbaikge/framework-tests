--TEST--
Ensure FDB::connect() tosses exceptions when in single server mode.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
$config['database.auto_connect'] = false;
$config['database.host'] = '127.1.1.1';
$config['database.user'] = 'root';
$config['database.pass'] = '';
$config['database.name'] = 'test';

require_once(dirname(__FILE__) . '/../../webroot.conf.php');
try {
	FDB::connect();
	var_dump(false);
} catch (Exception $e) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
