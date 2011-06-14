--TEST--
Ensure FDB::query() fails when there is no connection.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

try {
	FDB::query('SELECT 1');
} catch (Exception $e) {
	var_dump($e->getMessage());
}
?>
--EXPECT--
string(68) "Cannot find link to database. Are you sure you ran `FDB::connect()'?"
