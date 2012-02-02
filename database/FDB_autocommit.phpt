--TEST--
Ensure FDB::autocommit returns its current setting.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/FDB_test_tables.php');
var_dump(FDB::autocommit());
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECT--
bool(true)
