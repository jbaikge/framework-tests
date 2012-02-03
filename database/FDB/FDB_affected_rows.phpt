--TEST--
Ensure FDB::affectedRows returns an integer value representing the number of rows that were affected by the previously executed query.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');
FDB::query("INSERT INTO fdb_test (data) VALUES ('affected row')");
var_dump(FDB::affectedRows());
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
int(%d)
