--TEST--
Ensure FDB::slave tosses an exception when presented with a query that is not a SELECT query.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/FDB_test_tables.php');
var_dump(FDB::slave("INSERT INTO fdb_test (data) VALUES ('new row')"));
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
Fatal error: Uncaught exception 'Exception' with message 'Only SELECT statements may run on the slave.'%s