--TEST--
Ensure FDB::query properly performs string replacement when arguments are passed.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');
var_dump(FDB::query("SELECT * FROM fdb_test WHERE data IN('%s', '%s')", array('test 1', 'test 2'))->getSQL());
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
string(56) "SELECT * FROM fdb_test WHERE data IN('test 1', 'test 2')"
