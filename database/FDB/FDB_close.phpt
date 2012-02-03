--TEST--
Ensure FDB::close() works.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');
// Cleans up our mess for the next tests
fdb_test_clean();
FDB::close();
var_dump(true);
?>
--EXPECT--
bool(true)
