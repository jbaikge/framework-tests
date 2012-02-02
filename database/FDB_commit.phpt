--TEST--
Ensure FDB::commit executes when autocommit is off.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/FDB_test_tables.php');
FDB::autocommit(false);
FDB::query("INSERT INTO fdb_test (data) VALUES ('commit this')");
var_dump(FDB::commit());
// Cleans up our mess for the next tests
fdb_test_clean();
FDB::commit()
?>
--EXPECT--
bool(true)
