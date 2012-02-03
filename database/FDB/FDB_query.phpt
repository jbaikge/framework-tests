--TEST--
Ensure FDB::query() works.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

var_dump(get_class(FDB::query('SELECT 1')));

$old_level = error_reporting(0);
try {
	var_dump(get_class(FDB::query('SELECT 1 = %d')));
} catch (Exception $e) {
	var_dump($e->getMessage());
}
error_reporting($old_level);

var_dump(get_class(FDB::query('SELECT 1 = %d', 1)));
var_dump(get_class(FDB::slave('SELECT 1 = %d', 1)));
var_dump(get_class(FDB::master('SELECT 1 = %d', 1)));
?>
--EXPECTF--
string(13) "FMySQLiResult"
string(%d) "Query was empty%s"
string(13) "FMySQLiResult"
string(13) "FMySQLiResult"
string(13) "FMySQLiResult"
