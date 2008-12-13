--TEST--
Ensure FDB::query() works.
--FILE--
<?php
require('codeloader.php');
require('config.php'); // Provides $single_config and $master_slave_config

try {
	FDB::query('SELECT 1');
} catch (Exception $e) {
	var_dump($e->getMessage());
}

FDB::connect($single_config);

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
--EXPECT--
string(68) "Cannot find link to database. Are you sure you ran `FDB::connect()'?"
string(13) "FMySQLiResult"
string(15) "Query was empty"
string(13) "FMySQLiResult"
string(13) "FMySQLiResult"
string(13) "FMySQLiResult"
