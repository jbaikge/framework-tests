--TEST--
Ensure FDB::getQueryCount returns the number of queries that have been executed.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/FDB_test_tables.php');
FDB::query("INSERT INTO fdb_test (data) VALUES ('affected row')");
var_dump(FDB::getQueryCount());
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
int(%d)
